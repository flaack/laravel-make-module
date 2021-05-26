# Alternate Configuration

### Command option: `--flat`
`artisan make:module Foo --flat`

Results:
```
app
└── Modules
    └── Foo
        ├── Foo.php
        ├── FooApiResource.php
        ├── FooApiCollection.php
        └── FooController.php
```