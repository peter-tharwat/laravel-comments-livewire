# Changelog

All notable changes to `laravel-comments` will be documented in this file.

## 2.1.2 - 2024-04-29

### What's Changed

* Fix easymde update regressions by @sebastiandedeyne in https://github.com/spatie/laravel-comments-livewire/pull/63

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/2.1.1...2.1.2

## 2.1.1 - 2024-03-28

### What's Changed

* Fix easymde render issues in replies & improve autofocus reliability by @sebastiandedeyne in https://github.com/spatie/laravel-comments-livewire/pull/59

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/2.1.0...2.1.1

## 2.1.0 - 2024-03-12

- support L11
  **Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/2.0.4...2.1.0

## 2.0.4 - 2024-02-02

* Validate on allowed reactions

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/2.0.3...2.0.4

## 2.0.3 - 2023-10-10

### What's Changed

- Fixed default sorting of comments on PostgreSQL by @paulrrogers in https://github.com/spatie/laravel-comments-livewire/pull/56

### New Contributors

- @paulrrogers made their first contribution in https://github.com/spatie/laravel-comments-livewire/pull/56

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/2.0.2...2.0.3

## 2.0.2 - 2023-09-27

- Prevent lazy loading exception when using strict models

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/2.0.1...2.0.2

## 2.0.1 - 2023-09-18

- Fix a reactivity issue in the EasyMDE editor

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/2.0.0...2.0.1

## 2.0.0 - 2023-09-18

### Upgrading

#### Remove scripts component & Alpine

The `<x-comments::scripts />` component has been removed, you can remove this from your layout, Alpine is now included with Livewire by default, so this can be removed as well:

```blade
- <x-comments::scripts />
- <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>








```
### What's Changed

- Bump dependabot/fetch-metadata from 1.5.1 to 1.6.0 by @dependabot in https://github.com/spatie/laravel-comments-livewire/pull/52
- Bump actions/checkout from 3 to 4 by @dependabot in https://github.com/spatie/laravel-comments-livewire/pull/54
- Livewire 3 by @riasvdv in https://github.com/spatie/laravel-comments-livewire/pull/53

### New Contributors

- @riasvdv made their first contribution in https://github.com/spatie/laravel-comments-livewire/pull/53

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.4.0...2.0.0

## 1.4.0 - 2023-06-21

### What's Changed

- Add `no-reactions` option for comment components
- Bump dependabot/fetch-metadata from 1.3.5 to 1.3.6 by @dependabot in https://github.com/spatie/laravel-comments-livewire/pull/48
- Bump dependabot/fetch-metadata from 1.3.6 to 1.4.0 by @dependabot in https://github.com/spatie/laravel-comments-livewire/pull/50
- Bump dependabot/fetch-metadata from 1.4.0 to 1.5.1 by @dependabot in https://github.com/spatie/laravel-comments-livewire/pull/51

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.3.0...1.4.0

## 1.3.0 - 2023-01-26

- support L10

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.2.9...1.3.0

## 1.2.9 - 2022-12-20

### What's Changed

- Bump dependabot/fetch-metadata from 1.3.4 to 1.3.5 by @dependabot in https://github.com/spatie/laravel-comments-livewire/pull/46
- Implemented configurable auto-load fontawesome by @cognopatrick in https://github.com/spatie/laravel-comments-livewire/pull/47

### New Contributors

- @cognopatrick made their first contribution in https://github.com/spatie/laravel-comments-livewire/pull/47

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.2.8...1.2.9

## 1.2.8 - 2022-10-17

### What's Changed

- Bump dependabot/fetch-metadata from 1.3.3 to 1.3.4 by @dependabot in https://github.com/spatie/laravel-comments-livewire/pull/43
- get gravatar default image from config by @chris-norton in https://github.com/spatie/laravel-comments-livewire/pull/44

### New Contributors

- @chris-norton made their first contribution in https://github.com/spatie/laravel-comments-livewire/pull/44

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.2.7...1.2.8

## 1.2.7 - 2022-10-03

### What's Changed

- Fixes failing test by @archilex in https://github.com/spatie/laravel-comments-livewire/pull/39
- Removes unneeded field from update by @archilex in https://github.com/spatie/laravel-comments-livewire/pull/40
- Cloak "✓ Link copied!" by @martin-ro in https://github.com/spatie/laravel-comments-livewire/pull/42

### New Contributors

- @martin-ro made their first contribution in https://github.com/spatie/laravel-comments-livewire/pull/42

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.2.6...1.2.7

## 1.2.6 - 2022-08-11

### What's Changed

- [BUGFIX] Remove double quote in button component by @Woeler in https://github.com/spatie/laravel-comments-livewire/pull/33

### New Contributors

- @Woeler made their first contribution in https://github.com/spatie/laravel-comments-livewire/pull/33

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.2.5...1.2.6

## 1.2.5 - 2022-07-29

### What's Changed

- Emit only to parents by @luiscoutinh in https://github.com/spatie/laravel-comments-livewire/pull/31

### New Contributors

- @luiscoutinh made their first contribution in https://github.com/spatie/laravel-comments-livewire/pull/31

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.2.4...1.2.5

## 1.2.4 - 2022-07-07

- fix translation

## 1.2.3 - 2022-06-21

### What's Changed

- Remove min/max width on modals, fix delete modal position and width by @willemvb in https://github.com/spatie/laravel-comments-livewire/pull/27

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.2.2...1.2.3

## 1.2.2 - 2022-06-20

### What's Changed

- Smaller screen improvements by @willemvb in https://github.com/spatie/laravel-comments-livewire/pull/26

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.2.1...1.2.2

## 1.2.1 - 2022-06-20

### What's Changed

- comment.blade.php translatable by @JurjenRoels in https://github.com/spatie/laravel-comments-livewire/pull/25

### New Contributors

- @JurjenRoels made their first contribution in https://github.com/spatie/laravel-comments-livewire/pull/25

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.2.0...1.2.1

## 1.2.0 - 2022-06-08

### What's Changed

- Allow custom pagination views by @archilex in https://github.com/spatie/laravel-comments-livewire/pull/23

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.1.2...1.2.0

## 1.1.2 - 2022-06-08

### What's Changed

- Fix reply with textarea editor by @archilex in https://github.com/spatie/laravel-comments-livewire/pull/22

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.1.1...1.1.2

## 1.1.1 - 2022-06-07

### What's Changed

- Require laravel-markdown by @archilex in https://github.com/spatie/laravel-comments-livewire/pull/20
- Fix comment editing by @archilex in https://github.com/spatie/laravel-comments-livewire/pull/21

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.1.0...1.1.1

## 1.1.0 - 2022-06-06

### What's Changed

- Allow pagination results and page name to be configured by @archilex in https://github.com/spatie/laravel-comments-livewire/pull/18

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.0.3...1.1.0

## 1.0.3 - 2022-06-06

### What's Changed

- Prevent livewire multiple root element error by @archilex in https://github.com/spatie/laravel-comments-livewire/pull/17

### New Contributors

- @archilex made their first contribution in https://github.com/spatie/laravel-comments-livewire/pull/17

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.0.2...1.0.3

## 1.0.2 - 2022-05-31

- improve support for anonymous comments

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.0.1...1.0.2

## 1.0.1 - 2022-05-30

- fix n+1 error

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/1.0.0...1.0.1

## 0.0.5 - 2022-04-15

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/0.0.4...0.0.5

## 0.0.4 - 2022-04-11

**Full Changelog**: https://github.com/spatie/laravel-comments-livewire/compare/0.0.3...0.0.4

## 0.0.1 - 2021-12-30

- experimental release

## 0.0.1 - 2021-12-15

- experimental release

## 1.0.0 - 202X-XX-XX

- initial release
