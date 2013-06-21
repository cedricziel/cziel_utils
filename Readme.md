# Extbase & Fluid Utilities

[![Build Status](https://travis-ci.org/cedricziel/cziel_utils.png?branch=master)](https://travis-ci.org/cedricziel/cziel_utils)

## Validators

### WordCountValidator

The WordCountValidator validates a domain objects' property by first stripping tags of and then using PHP's
str_word_count function.

#### Usage
Use it to directly annotate your domain object's property.

**Options:**
Use one or both of the following arguments:
- minimumWords (int) A positive Integer
- maximumWords (int) A positive Integer

**Restrictions:**
minimumWords must not be greater than maximumWords

**Hints:**
Please be aware that the Validator **does not** validate your existing TCA/TCEForms. I'm currently working on it.


#### Example

```php
class Post extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	...
	/**
	 * A description
	 *
	 * @validate \Cziel\CzielUtils\Validation\Validator\WordcountValidator(maximumWords=700)
	 * @var \string
	 */
	protected $description;
	..
}
```

## View

### JsonView

The JSON View is actually able to replace the default template view. It comes into play, when you want to render AJAX
calls and/or design an external accessible API for your application.

This class was backported from TYPO3 Flow.

Detailed Instructions on its usage can be found in the [TYPO3 Flow Documentation](http://docs.typo3.org/flow/TYPO3FlowDocumentation/TheDefinitiveGuide/PartIII/ModelViewController.html#json-view).


#### Usage
Use it to decide on runtime, if you need a JSON View, as Extbase doesn't offer the same comfortable View API as Flow does.

One of the magic initialize* Methods should do the replacement of the view.

**Restrictions:**
None so far.

**Hints:**
By default, only the 'value' variable gets rendered.