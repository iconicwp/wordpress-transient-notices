# WordPress Transient Notices

A simple helper class that enables cross-page wordpress admin notices. This is especially useful if you want to show a notice after saving some information, like the `save_post` hook.

The notices are stored using transients that expire as soon as they have been displayed.

## Usage

Firstly, include or autoload the class file. Once that's done, you can trigger a notice like so:

```
$notices = new Iconic_Transient_Notices();

$notices->add_notice('error', __('Oops, some error message', textdomain');
```

The next time an admin page loads, your error will be displayed.

## Methods

`add_notice( $type, $message )`

* `$type` The error message type. Can be error, warning, or info.
* `$message` Your error message.
