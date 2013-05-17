silverstripe-areyouahuman
=========================

Original by stozze
------------------

Adapted for SpamProtector by SDC
------------------------------------

Usage
-----

Add the root folder called "areyouahuman" in the root of your Silverstripe installation. Make sure to rename it to "areyouahuman" if it is not already named so.

In your site _config.php you can set the publisher and scoring keys like this:

    AYAHField::$publisher_key = 'your publisher key';
    AYAHField::$scoring_key = 'you scoring key';

If you want the Are You a Human field to be the automatic Spam Protection field, also add the following line to your _config.php:

	SpamProtectorManager::set_spam_protector('AYAHProtector');

After you have configured your keys, add AYAHField to the forms you want validated via the "Are you a human"-service (www.areyouahuman.com).
Something like this:

    $formFields->push(new AYAHField());

You must have registered an account at www.areyouahuman.com to be able to use their service. It's *free*!