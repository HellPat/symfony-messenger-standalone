# Showcase Messenger

An example configuration for `symfony/messenger`.

Want to see the code: [Look at `bin/console`](./bin/console).

## Purpose of this Project

The purpose of this project is to get a deeper understanding of the [`symfony/messenger`](https://symfony.com/doc/current/components/messenger.html) component.
I used the excellent component in Symfony for a while. Now it's time for me to **understand** what I did :-)

The way I build applications does not use many Symfony-Components. I'll try to build more Micro-Applications
without using symfony in the future but will keep using some components (because they're excellent).

This project will **NOT** contain best practices **NOR** ever be production ready or a good starter for your projects.

## Constraints

- Setup should be as simple as possible
- Code should be as simple as possible
- More advanced configurations will live in own branches (Ideas & Contributions welcome)

## Producing Messages

Since I want to provide minimal examples, there are only 2 simple Message-Objects which represent
simple `string`-Messages.

They can be dispatched using a [symfony/console](https://symfony.com/doc/current/components/console.html) command.

```sh
# Product & Dispatch a Sync message. The Handler is beeing executed directly and some debug output is shown.
bin/console dispatch:message "Hello World :-)"

# Dispatches an Async-Message.
# The message will appear in the SQLite-File `db.sqlite`
bin/console dispatch:message "Hello World :-)" --async
```

## Receiving Messages

We have a `ReceiverInterface` implementation (our `DoctrineReceiver`) with the name `doctrine`.
We can listen for messages now.

```sh
bin/console messenger:consume default_receiver
```

The process now listens for new Messages. Try producing some new "async" messages in a new terminal (`bin/console dispatch:message "Hello new World :-)" --async`).
The Consumer should now handle your message.

## Record Failures

Everyone fails. Mostly me. That's fine if we handle failures and fix things.

My Demo-Command produces failures by incidence:

```sh
bin/console dispatch:message "Hello World :-)" --async --should-fail
```

The Message is being stored in our `messages`-Table successfully.
Now we need to handle it -> which fails (because we wanted it to fail).

```sh
bin/console messenger:consume default_receiver
```

Now check the Log-Output. It shows you an info (not an error) that:

> [info] Rejected message Hellpat\AsyncTextMessage will be sent to the failure transport Symfony\Component\Messenger\Bridge\Doctrine\Transport\DoctrineSender.

Now we can try to handle check the `failed_messages` table or use this neat debug command:

```sh
bin/console messenger:failed:show
```

## TODO

- [ ] manual retry failed messages
- [ ] automatic retry for failed messages (requeue)
- [ ] remove failed messages
- [ ] maybe provide a simple configurator object?
