#ThetaAlexa
This is my simple php-based Alexa server, that allows you to host your own custom skills using a standard webserver (it requires a https certificate, of course).

##Features
- Give speech output, either in plaintext or in SSML (Speech Synthesis Markup Language)
- Show cards in the alexa app (also with pictures)
- Handing over session attributes to store data within one conversation

##To be added
- Simple way to host mp3 files (for jingles and sound effects within responses)
- Include a SQL database for storing user data permanently
- add more demo intents to show the different features

##gaiterjones original project
I built this project based on gaiterjones alexa server which can be found here: https://github.com/gaiterjones/amazon-alexa-php-hello-world-example

Since I noticed a lot of unimplemented alexa features, I decided to fork this project and add the missing features. Plus I also simplified some things ;-)

Here is the original license:

>The MIT License (MIT) Copyright (c) 2016 gaiterjones

>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the >"Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, >distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to >the following conditions:

>The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF >MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR >ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH >THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
