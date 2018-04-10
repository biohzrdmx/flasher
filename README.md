Flasher
=======

Some Rails-like `flash[]` functionality for Hummingbird Lite.

Pass simple strings between requests, useful for web applications and MVC-style implementations.

## Requirements

- Hummingbird Lite 3.0.1 or newer

## Usage

First, include the library.

Then, to set a value call the `flash` method:

	Flasher::flash('message', 'Hi!');

The values will be held on `$_SESSION` until the next request, then you can recover them:

	$message = Flasher::flash('message');

If you want to keep an entry for another request, use the `keep` method:

	Flasher::keep('message');

Flasher includes two utility methods `alert` and `notice`:

	Flasher::alert('The password is not valid');
	Flasher::notice('You settings have been updated');

To recover them:

	$alert = Flasher::alert();
	$notice = Flasher::notice();

## Licensing

This software is released under the MIT license.

Copyright © 2018 biohzrdmx

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

## Credits

**Lead coder:** biohzrdmx [github.com/biohzrdmx](https://github.com/biohzrdmx)