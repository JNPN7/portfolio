<section id="contact">
    <div class="clip-parent">
        <div class="clip-child"></div>
    </div>
    <div class="sized-box"></div>
    <div class="flex-container-contact">
        <h1 class="header" style="color: #ffffff">CONTACT</h1>
        <div class="header-bar" style="background-color: #ffffff"></div>
        <div class="contact-group">
        <div class="contact-item">
            <div class="col">
            <div class="row align-items-center">
                <div class="icon">
                <i class="fa fa-home" aria-hidden="true"></i> 
                </div>
                <h5>Bhaktapur, Nepal</h5>
            </div>
            </div>
            <div class="col">
            <div class="row align-items-center">
                <div class="icon">
                <i class="fa fa-phone" aria-hidden="true"></i> 
                </div>
                <h5>9818943997</h5>
            </div>
            </div>
            <div class="col">
            <div class="row align-items-center">
                <div class="icon">
                <i class="fa fa-envelope" aria-hidden="true"></i> 
                </div>
                <h5>jpphanju54@gmail.com</h5>
            </div>
            </div>
            <div class="sized-box"></div>
            <div class="row" style="padding-left: 50px">
            <div class="icon link">
                <a href="https://www.facebook.com/juhel.shrestha/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </div>
            <div class="icon link">
                <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
            <div class="icon link">
                <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
            <div class="icon link">
                <a href="https://github.com/JNPN7"><i class="fa fa-github" aria-hidden="true"></i></a>
            </div>
            <div class="icon link">
                <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </div>
            </div>
        </div>

        <div class="contact-item">
            <form method="POST" action="{{ route('addContact') }}">
                @csrf
                <div class="contact-form">
                    <div class="col">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Enter your name" required/>
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @enderror
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required/>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @enderror
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject"  placeholder="Enter subject" required/>
                    </div>
                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('subject') }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="col">
                        <textarea class="form-control" name="message"placeholder="Enter message" rows="3" cols="40" required></textarea>
                        <div class="sized-box"></div>
                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @enderror
                        <button class="btn btn-primary mb-2">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>