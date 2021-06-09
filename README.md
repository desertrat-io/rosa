[![Build Status](https://travis-ci.com/desertrat-io/rosa.svg?branch=master)](https://travis-ci.com/desertrat-io/rosa)
[![Coverage Status](https://coveralls.io/repos/github/djzara/rosa/badge.svg?branch=master)](https://coveralls.io/github/desertrat-io/rosa?branch=master)
[![MIT license](http://img.shields.io/badge/license-MIT-brightgreen.svg)](http://opensource.org/licenses/MIT)
# Rosa - The Cloud Framework for PHP

Experiment in creating a framework. Rosa provides a system by which
creating applications that leverage cloud services is simple, providing
as much as possible out of the box, with the ability to extend to your
own cloud services in whichever way you need. Or, use Rosa as a basic
MVC framework on its own, just keep in mind the cloud.


# Motivation

The cloud is becoming more and more of a part of our every day lives. The Internet of Things is permeating every pore
of society now as we grow more and more connected.

However, this has left a great amount of disparity between what we do as developers of web applications and tools, and
the cutting edge use cases. Best practices and design patterns are what they are, and there is no reason to not make
the most of them still. MVC works great for the web, so why not the cloud? The cloud often backs our MVC applications
in the first place, whether it be infrastructure, email, storage, queuing, the list goes on.

We are also growing more and more reliant on micro-services to help distribute our architectures and further achieve
the loose coupling we need to have a truly efficient, resilient, reusable, and maintainable system of products and tools.

# Why PHP?

I could have picked from a zillion other languages that may even be better suited to this kind of behavior, so why
the ever present elephant in the room? (get it?) Because PHP is also not what it was 10 years ago. Might as well have
a new name now.

We have the ability to type check parameters and return types, or we can choose not to. I think that's a very powerful
feature to have in today's world where type safety is so important. The interpreter is lightning fast compared to what it
was. The community is always growing thanks to PHPs low barrier to entry. However, there are enough features to keep
you learning for years and years, making the most out of this language. PHP today is a ghost of what it was a decade ago.
It's nothing alike. Pre-runtime detection of errors, maybe some parameterized types soon? ehhhhh?

Or maybe true type inference like Scala and Go....

# So what cloud services do you support?

Out of the box, well that's to be determined as development moves ahead. Additionally...what is a cloud service in the
first place? Doesn't that have to be defined? Well, let's go with the common assumption that the cloud is just someone
else's computer out there in the aether that does something we want it to do. We'll go with that. Descriptive? Nah, 
probably not enough, but that's the point. With a vague meaning comes a more clear idea as to what the purpose is of Rosa.
Yes, it'll support many common platforms right out of the box, but that should never be limited. With this framework
I'll be trying hard to keep in mind the future, as future proofing is the name of the game!

# Is this a work in progress?

Duh?

# What about the front end?

Don't worry, that's coming too

# Aren't you tired of MVC?

Rosa provides an MVC platform to develop on, but you are by no means restricted to it. Certain things are easier,
like tapping in to the DI features, but you're not required to. Use what makes the most sense for your requirements.s

### Other stuff

If you'd like to give early suggestions on what you think we can do that isn't being done, or you would like to see
done better, or maybe something that isn't even being thought of, go ahead and open an issue for it. I won't mind
a bit. Tell me my idea is stupid, and I'll try to prove to you why it's not. That ends up working nicely for both of us :)


[Mike Lawson](mailto:mike@desertrat.io)