[![Build Status](https://travis-ci.org/djzara/rosa.svg?branch=master)](https://travis-ci.org/djzara/rosa)


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
the ever present elephant in the room? (get it?) Because PHP is also not what it was 10 years ago. What used to be
the North End's worth of spaghetti in code in near consistent fashion has evolved significantly.

(PS: If you don't know what the North End is, go to Boston sometime. Eat your heart out NYC!)

We have the ability to type check parameters and return types, or we can choose not to. I think that's a very powerful
feature to have in today's world where type safety is so important. The interpreter is lightning fast compared to what it
was. The community is always growing thanks to PHPs low barrier to entry. However, there are enough features to keep
you learning for years and years, making the most out of this language. PHP today is a ghost of what it was a decade ago.
It's nothing alike. Pre-runtime detection of errors, maybe some parameterized types soon? ehhhhh?

# So what cloud services do you support?

Out of the box, well that's to be determined as development moves ahead. Additionally...what is a cloud service in the
first place? Doesn't that have to be defined? Well, let's go with the common assumption that the cloud is just someone
else's computer out there in the ether that does something we want it to do. We'll go with that. Descriptive? Nah, 
probably not enough, but that's the point. With a vague meaning comes a more clear idea as to what the purpose is of Rosa.
Yes, it'll support many common platforms right out of the box, but that should never be limited. With this framework
I'll be trying hard to keep in mind the future, as future proofing is the name of the game!

# Is this a work in progress?

Duh?

# What about the front end?

Don't worry, that's coming too

# Aren't you tired of MVC?

Who said this was only MVC? You can use it like that if you choose, but once my plans are in place...

### Other stuff

If you'd like to give early suggestions on what you think we can do that isn't being done, or you would like to see
done better, or maybe something that isn't even being thought of, go ahead and open an issue for it. I won't mind
a bit. Tell me my idea is stupid, and I'll try to prove to you why it's not. That ends up working nicely for both of us :)


[Mike Lawson](mailto:mlawson1986@gmail.com)


NOTE: During initial development, many classes will contain stubs as work to implement actual
requirements is done