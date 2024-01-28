<?php
    require_once("partials/header.php");
?>
                <div class="contact-background">
                    <div class="text">
                        <h2>Contact</h2>
                        <div class="spans">
                            <a class="nav-link" href="index.php
                            ">Home</a>
                            <span><i class="fa fa-circle" style="font-size:8px; color: green;"></i> Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" form-row p-5 ">
                <div class="contact-info d-flex flex-lg-row">
                    <div class='mb-5 location'>
                        <i class="fa fa-location-dot"  style="font-size:30px; color: green;"></i><span class="pl-5">Address</span>
                        <p class='p-2'>9, Freedom Estate Magboro,Ogun State</p>
                    </div>
                    <div class='mb-5 phone'>
                        <i class="fa fa-phone"  style="font-size:30px; color: green;"></i><span class="pt-3">Phone</span>
                        <p class='p-2'>+234(12345678)</p>
                    </div>
                    <div class='mb-5 email'>
                        <i class="fa fa-envelope"  style="font-size:30px; color: green;"></i><span class="pt-3">Email</span>
                        <p class='p-2'>tfarms@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col form-row">
                <div class="p-5 contact-form text-center col">
                    <h3>Drop us a message for any query</h3>
                    <p>If you have an idea, we would love to hear about it.</p>
                    <form action=" " method="post" class="mt-5 col form">
                         <div class="form1 col-10 m-auto d-lg-flex flex-lg-row">
                            <input type="text" name="username" id="username" placeholder="Name"  class="form-control form-control-lg m-3">
                            <input type="email" name="useremail" id="email" placeholder="Email"  class="form-control form-control-lg m-3">
                        </div>
                        <div class="form1 col-10 m-auto d-lg-flex flex-lg-row">
                            <input type="number" name="user" id="userphone" placeholder="Phone"  class="form-control form-control-lg m-3">
                            <input type="text" name="subject" id="subject" placeholder="Subject"  class="form-control form-control-lg  m-3 ">
                        </div>
                    
                        <div class="m-auto col-10 text-center">
                            <textarea type="text" name="message" class=" form-control form-control-lg" rows="5" cols="10" placeholder="Your Message"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success col-md-3 mt-5">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
 <?php
        require_once("partials/footer.php");
 ?>