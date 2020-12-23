# Log activity inside your Laravel app



The 'Karimelba/spatie-laravel-activitylog-Mongodb' is a copy of 'spatie/laravel-activitylog' that is compatible with Laravel-mongodb package, it provides easy to use functions to log the activities of the users of your app. It can also automatically log model events. 
The Package stores all activity in the `activity_log` table.

Here's a demo of how you can use it:

```php
activity()->log('Look, I logged something');
```

You can retrieve all activity using the `Spatie\Activitylog\Models\Activity` model.

```php
Activity::all();
```

Here's a more advanced example:
```php
activity()
   ->performedOn($anEloquentModel)
   ->causedBy($user)
   ->withProperties(['customProperty' => 'customValue'])
   ->log('Look, I logged something');
   
$lastLoggedActivity = Activity::all()->last();

$lastLoggedActivity->subject; //returns an instance of an eloquent model
$lastLoggedActivity->causer; //returns an instance of your user model
$lastLoggedActivity->getExtraProperty('customProperty'); //returns 'customValue'
$lastLoggedActivity->description; //returns 'Look, I logged something'
```


Here's an example on [event logging](https://docs.spatie.be/laravel-activitylog/v3/advanced-usage/logging-model-events).

```php
$newsItem->name = 'updated name';
$newsItem->save();

//updating the newsItem will cause the logging of an activity
$activity = Activity::all()->last();

$activity->description; //returns 'updated'
$activity->subject; //returns the instance of NewsItem that was saved
```

Calling `$activity->changes()` will return this array:

```php
[
   'attributes' => [
        'name' => 'updated name',
        'text' => 'Lorum',
    ],
    'old' => [
        'name' => 'original name',
        'text' => 'Lorum',
    ],
];
```


## Documentation
You'll find the documentation on [https://docs.spatie.be/laravel-activitylog/v3](https://docs.spatie.be/laravel-activitylog/v3).

Find yourself stuck using the package? Found a bug? Do you have general questions or suggestions for improving the activity log? Feel free to [create an issue on GitHub](https://github.com/spatie/laravel-activitylog/issues), we'll try to address it as soon as possible.

If you've found a security issue please mail [freek@spatie.be](mailto:freek@spatie.be) instead of using the issue tracker.
