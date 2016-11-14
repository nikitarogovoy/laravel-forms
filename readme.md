# Forms

Forms is a Laravel 5 package designed to facilitate the easy use of Bootstrap-compatible forms.

## Installation

Laravel Forms uses the `laravelcollective/html` and `benallfree/laravel-stapler-images` packages. Configure these first by following their package instructions.

In `app/config.php`:

Add

    'providers' => [
      BenAllfree\Forms\FormsServiceProvider::class,
    ]

Alias the models:

    'aliases' => [
    ]

Then publish:

    ./artisan vendor:publish

Laravel Forms requires Bootstrap for form fields to render properly. Additionally, specific field types require other dependencies:

* markdownarea - requires SimpleMDE
* date - requires bootstrap-datepicker
* image - requires laravel-stapler-images

Either include these separately or check the `resources/bower_components` folder in this repository for compatible versions of all JS dependencies.

## Usage

    {!! Form::open(['files'=>true]) !!}
    @include('forms.markdownarea', ['obj'=>$obj, 'name'=>'fieldName', 'placeholder'=>'This is the label'])
    {!! Form::close() !!}

## Field Types and Paramaters


### checkbox
### date
### file
### image

Expects `thumb` size to exist in the `laravel-stapler-images` package setup.

### markdownarea
### select
### text
### textarea