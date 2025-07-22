# Laranums Tests

This test suite provides comprehensive coverage for all methods in the Laranum trait.

## Installation

First, install the test dependencies:

```bash
composer install
```

## Running Tests

Run all tests:

```bash
composer test
# or
vendor/bin/phpunit
```

Run specific test categories:

```bash
# Unit tests only
vendor/bin/phpunit tests/Unit

# Feature tests only
vendor/bin/phpunit tests/Feature
```

## Test Coverage

### Unit Tests

#### LookupMethodsTest
- ✅ `fromName()` - Find enum case by name
- ✅ `fromValue()` - Find enum case by value (backed enums)
- ✅ `fromNameOrDefault()` - Find enum case by name with fallback
- ✅ `fromValueOrDefault()` - Find enum case by value with fallback

#### MetadataMethodsTest
- ✅ `className()` - Get enum class basename

#### ConversionMethodsTest
- ✅ `toArray()` - Convert to [value => name] array
- ✅ `toArrayReversed()` - Convert to [name => value] array
- ✅ `names()` - Get all enum case names
- ✅ `values()` - Get all enum case values

#### TranslationMethodsTest
- ✅ `transNames()` - Get translated names [name => translated]
- ✅ `transValues()` - Get translated values [value => translated]
- ✅ `trans()` - Get single translation

#### UtilityMethodsTest
- ✅ `rand()` - Get random enum case
- ✅ `rand($ignored)` - Get random enum case excluding specified cases
- ✅ `isValidName()` - Check if name exists
- ✅ `isValidValue()` - Check if value exists

#### LaravelSpecificMethodsTest
- ✅ `collect()` - Get Laravel collection of enum cases
- ✅ `jsonSerialize()` - JSON serialization with translations

### Feature Tests

#### MakeLaranumCommandTest
- ✅ Create empty enum without cases
- ✅ Create simple enum with cases (no backing)
- ✅ Create string-backed enum
- ✅ Create integer-backed enum
- ✅ Directory creation when not exists

## Test Fixtures

The tests use three enum fixtures:

1. **StatusEnum**: String-backed enum (`active`, `inactive`, `pending`)
2. **PriorityEnum**: Integer-backed enum (`1`, `2`, `3`)
3. **SimpleEnum**: Unit enum (no backing type)

## Mocking

Translation tests use mocked `Lang::get()` calls to simulate real translation behavior without requiring actual translation files.

## Running Specific Tests

```bash
# Run a specific test class
vendor/bin/phpunit tests/Unit/LookupMethodsTest.php

# Run a specific test method
vendor/bin/phpunit --filter="it_can_find_enum_case_by_name"
```
