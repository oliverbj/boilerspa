# Using this package: https://github.com/wilburpowery/cashflow-assistant

# Installation

`git clone https://github.com/oliverbj/boilerspa.git <project_name>`

`cd <project_name>`

`composer install`

`cp .env.example .env`

Go change the settings in .env to match your environment.

`php artisan key:generate`

`php artisan migrate`

# Passport

If you wish to make use of Laravel Passport, you should run:

`php artisan passport:install`
`php artisan passport:keys`

# Compile assets

`npm install`

And you're done.

# DocParser

**Creating Webhooks**

In order to create a webhook, you must configure your Docparser account to send their requests to your server:

**Docparser:**
Once you have created your parser, go to: `Integrations -> Simple Webhook -> Fill out the form.`

In the _Additional Headers_, you must set the **Personal Access Token**, which you have created from Passport like:

`Authorization: Bearer <token>`

**Your application:**
You must create a controller to catch your webhook. This can be done by using below template:

`$ php artisan make:controller ControllerName

```
public function webhook(Request $request)
{
    //Initate our model to interact with our database.
    $hook = new Model();

    //A simple belongsTo relation
    $document->creator()->associate(auth()->user());

    //Below function format the names from Docparser to match our database name.
    foreach ($request->all() as $key => $value) {
        //Important: this will remove the _{formatted|numbers} at the end of the JSON object.
        //Examples:
        //vgm_cutoff_date_formatted   => vgm_cutoff_date
        //shipment_reference_01       => shipment_reference
        $newKey = preg_replace('/(_["formatted"0-9]+)$/', '', $key);
        $document->$newKey = $value;
    }

    //Insert (or update existing) data in our database.
    $document::updateOrCreate(
        ['booking_reference' => $document->booking_reference],
        $document->getAttributes()
    );

    return response()->json('OK');
}
```

Above is just an example to get started.
