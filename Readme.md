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
