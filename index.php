<?php 
include "includes/vars.php";
include "includes/referrer.php";
include "includes/leadsource.php";
include_once "includes/db.php";
include 'mobi/includes/Mobile_Detect.php';
$detect = new Mobile_Detect;

// See if we need to set the no redirect cookie
if(isset($_GET['redirect']) && $_GET['redirect'] == 'false')
{
    $_SESSION['MobileRedirect'] = false;
}
else if(isset($_GET['redirect']) && $_GET['redirect'] == 'true')
{
    $_SESSION['MobileRedirect'] = true;
}

//url redirects to mobile site when entered in mobile browser
if($detect->isMobile() && $_SESSION['MobileRedirect'] != false){
    $location = "http://www.alliedcash.com/mobi/";
    //$location = "http://10.1.31.95/mobi/";
    header("Location: $location");
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <title>Allied Cash Advance Loans, Payday Loans | Allied Cash</title>
    <meta name="description" content="Apply now and get the money you need to make it to your next payday. Quick and convenient cash advances online from Allied Cash Advance."/>
    <meta name="keywords" content="Payday cash advance loans, money advances, title loans, prepaid debit cards, allied cash advance, se habla espanol" />
    <link href="css/smoothness/jquery-ui-1.9.1.custom.css" rel="stylesheet" />
    <link href="css/style_c.css" rel="stylesheet" />
    <link rel="canonical" href="http://www.alliedcash.com"/>
    <script src="//cdn.optimizely.com/js/65413930.js"></script>
    <script src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" src="js/form_starthere.js"></script>
    <script>
    $(function() {      
        $( "#tabs" ).tabs();
        // Hover states on the static widgets
        $( "#dialog-link, #icons li" ).hover(
            function() {
                $( this ).addClass( "ui-state-hover" );
            },
            function() {
                $( this ).removeClass( "ui-state-hover" );
            }
        );
        $("#tabs").tabs("select","tabs-2");
    });
    </script>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->    
</head>

<body>
    <header>
        <div class="container">    
            <img src="images/trusts.jpg" alt="VeriSign and CFSA" id="trusts" />        
            <p class="phone">Apply By Phone <span>888-848-6950</span></p>            
            <h1><a href="/" class="toggleopacity" title="Allied Cash Advances" id="logo"><img width="234" height="86" border="0" src="images/logo.png" alt="Allied Cash Advance Loans" /></a></h1>
            <nav>
                <a href="products/" title="Products" id="products">Products</a>
                <a href="howitworks/" title="How It Works">How It Works</a>
                <a href="faq/" title="FAQs">FAQs</a>
                <a href="aboutus/" title="About Us">About Us</a>
                <a href="resources/" title="Resources">Resources</a>
                <a href="careers/" title="Careers">Careers</a>
                <a href="contact/" title="Contact Us" id="contact">Contact Us</a>
            </nav>
        </div>
    </header>
    <section id="body">
        <div class="container clearfix">
            <div id="hero">
                <div id="miniApp">
                <form name="starthereForm" id="starthereForm" method="post" action="starthere/">   
                    <img src="images/starthere.png" alt="Start here for your cash advance" class="intro" />
                    <p class="formRow"><label id="fname_label" for="">First Name</label><input type="text" id="first_name" name="first_name" onkeypress="return enterkeyforstarthere(event,'starthereForm');" /></p>
                    <p class="formRow"><label id="lname_label" for="">Last Name</label><input type="text" id="last_name" name="last_name" onkeypress="return enterkeyforstarthere(event,'starthereForm');" /></p>
                    <p class="formRow"><label id="phone_label" for="">Phone Number</label><input type="tel" id="phone" name="phone" onkeypress="return enterkeyforstarthere(event,'starthereForm');" /></p>
                    <p class="formRow"><label id="email_label" for="">Email Address</label><input type="email" id="email" name="email" /></p>
                    <p class="formRow"><label id="zip_label" for="">Zip Code</label><input type="text" id="zip" name="zipcode" onkeypress="return enterkeyforstarthere(event,'starthereForm');" /></p>
                    <p class="formRow"><label id="amount_label" for="">Desired Amount</label><input type="text" id="amount_desired" name="amount_desired" onblur="moneyFormat(document.starthereForm.amount_desired)" onkeypress="return enterkeyforstarthere(event,'starthereForm');" /></p>
                    <p class="submitRow">						
						<span id="agree_label">
						<a href="javascript:void()" onclick="window.open('/privacy_policy.html', 'cash', 'directories=0,titlebar=0,toolbar=0,location=0,status=0,menubar=0,scrollbars=yes,resizable=no,width=400,height=350')">
						Agree to Terms
						</a>
						<input type="checkbox" name="agree" id="agree" value="1" class="checkbox" onkeypress="return enterkeyforstarthere(event,'starthereForm');" />
						</span>
						<a href="javascript:validate_form();">
						<img src="images/getCashSM.png" alt="Get Cash!"></a>
					</p>
                </form>
                </div>
            </div>
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">How To Apply</a></li>
                    <li><a href="#tabs-2">Payday Loans</a></li>
                    <li><a href="#tabs-3">Installment Loans</a></li>
                    <li><a href="#tabs-4">Title Loans</a></li>
                    <li><a href="#tabs-5">FAQs</a></li>
                    <li><a href="#tabs-6">Other Products</a></li>
                </ul>
                <div id="tabs-1">
                    <h2>How To Apply</h2>
                    <p><strong>1.</strong>  Apply in minutes online, using our simplified application.</p>
                    <p><strong>2.</strong>  Receive an instant approval notification upon submission of your application. </p>
                    <p><strong>3.</strong>  Customize your loan according to your needs and payment schedule.*</p>
                    <p><strong>4.</strong>  E-sign your loan documents safely and securely.</p>
                    <p><strong>5.</strong>  Verify your information to complete the application.</p>
                    <p><strong>6.</strong>  Collect the funds from your bank account in as little as one business day.</p>
                    <p><strong>7.</strong>  Repay your loan and fees via automatic electronic withdrawal or extend your due date.</p>
                    <p><a href="/zipnotfound/?ApplyNow=true" titie="Apply Now" class="applyNow"><img src="images/applyNow.png" title="Apply Now" /></a></p>
                </div>
                <div id="tabs-2">
                    <h2>Payday Loans</h2>
                    <p>Another form of cash advance, a payday loan can help get you through to your next paycheck when unexpected expenses arise. You can get cash as soon as the next business day, and avoid things like late fees, overdraft charges, and reconnect/reactivation fees.</p> 
                    <p><a href="products/#product_1" title="Learn More">Learn More</a> or &nbsp;&nbsp;<a href="/zipnotfound/?ApplyNow=true" titie="Apply Now" class="applyNow"><img src="images/applyNow.png" title="Apply Now" /></a></p>
                </div>
                <div id="tabs-3">
                    <h2>Installment Loans</h2>
                    <p>Get more money, and more time to repay, with an installment loan from Allied Cash Advance. Available to customers in good standing, installment loans start at $2,500 and require only one payment per month.</p>
                    <p><a href="products/#product_2" title="Learn More">Learn More</a> or &nbsp;&nbsp;<a href="/zipnotfound/?ApplyNow=true" titie="Apply Now" class="applyNow"><img src="images/applyNow.png" title="Apply Now" /></a></p>
                </div>
                <div id="tabs-4">
                    <h2>Title Loans</h2>
                    <p>The highway of life can get bumpy. To bridge the gap when unexpected expenses sidetrack you, consider a title loan. If your vehicle is paid off, you can use it to get up to $5,000 in cash.</p>
                    <p><a href="products/#product_3" title="Learn More">Learn More</a> or &nbsp;&nbsp;<a href="/zipnotfound/?ApplyNow=true" titie="Apply Now" class="applyNow"><img src="images/applyNow.png" title="Apply Now" /></a></p>
                </div>
                <div id="tabs-5">
                    <h2>FAQs</h2>
                    <p><strong>What is a Cash Advance?</strong><br />
                    A cash advance is a short-term loan that usually lasts no longer than two weeks.</p>
                    <p><strong>Why choose Allied Cash Advance?</strong><br />
                    Allied Cash Advance has been helping folks like you since 1999, and we are a member in good standing of the Community Financial Services of America <a href="http://cfsaa.com/" title="CFSA">CFSA</a>.</p>
                    <p><strong>What if I change my mind after applying for a cash advance?</strong><br />
                    A cash advance provider who follows the <a href="http://cfsaa.com/" title="CFSA">CFSA</a> best practices, as Allied Cash Advance does, will give all customers the right to rescind, or return, a payday loan within a clearly stated, limited time frame.</p>
                    <p><strong>How is the cash advance industry regulated?</strong><br />
                    The cash advance industry is regulated by state and federal law. Members of the Community Financial Services Association of America <a href="http://cfsaa.com/" title="CFSA">CFSA</a> further self-regulate for the benefit of their customers.</p>
                    <p><strong>What do I need to apply?</strong><br />
                    To apply, you generally need proof of income, approved proof of identity, and an active checking account.</p>
                    <p><a href="faq/" title="FAQs">All FAQs</a>.</p>
                </div>
                <div id="tabs-6">
                    <h2 id="tab6">Other Products</h2>
                    <p class="product">Prepaid Debit Card</p>
                    <p>Get the convenience of credit card acceptance, without the hassle of late charges and overdraft fees. With a prepaid debit card, you have control of your spending. Best of all, you can obtain one even if you have less-than-perfect credit. The card is free with a minimum $10 load. <a href="products/#product_8" title="Learn More">Learn More</a>.</p>
                    <p class="product">Prepaid Gift Card</p>
                    <p>It’s the right size, the right color, and easy to wrap! A prepaid gift card from Allied Cash Advance is the perfect for nearly any occasion. <a href="products/#product_5" title="Learn More">Learn More</a>.</p>
                    <p class="product">Prepaid Phone Card</p>
                    <p>Purchase a new prepaid phone card from providers such as Alltel, AT&amp;T, Boost, Cricket, Virgin Mobile, TracFone, T Mobile, Verizon and more. You can also add to your existing card. <a href="products/#product_5" title="Learn More">Learn More</a>.</p>         
                    <p class="product">Express Credit</p> 
                    <p>For preferred customers, with a slid payment history, getting cash is even easier to get cash now. Well-qualified applicants can receive up to $1,500. <a href="products/#product_2" title="Learn More">Learn More</a>.</p>                    
                    <p class="product">Auto Equity</p>
                    <p>There’s money in your car! With an auto equity loan, you can use your car to get cash, and still keep they keys--- even if it isn’t fully paid off. <a href="products/#product_4" title="Learn More">Learn More</a>.</p>
                </div>
            </div>
            <div id="testimonials">
                <h3>See what our users are saying!</h3>
                <p>Was in a bind and the Allied folks had me in and out in minutes - no hassles - got more than I thought I could and they treated me like a friend. Laurie deserves a raise - she's the best. They're my new plan B.  <strong> - Jake2030</strong></p>
                <p>They're great! Allied had me qualified quickly and I would recommend anyone interested in a payday loan to give them a call.   <strong>- AAguayo</strong></p>
                <p><a href="/testimonials/" title="See all testimonials">See All Testimonials</a></p>
            </div>
            <div id="findLocation">
            <form name="findalocationForm" id="findalocationForm" method="post" action="starthere/">
                <h3>Find a location</h3>
                <p>Enter your zip code below to see if an Allied Cash Advance store is near you!</p>
                <p class="formRow"><input type="text" id="" name="zipcode" placeholder="Enter your zip code" /><input type="image" src="images/findNow.png" value="" /></p>
            </form>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div id="footerNav">
                <h4>AlliedCash.com Main Menu</h4>
                <ul>
                    <li><a href="/" title="Home">Home</a></li>
                    <li><a href="resources/" title="Resources">Resources</a></li>
                    <li><a href="products/" title="Products">Products</a></li>
                    <li><a href="faq/" title="FAQ">FAQ</a></li>
                    <li><a href="aboutus/" title="About us">About us</a></li>
                    <li><a href="news/" title="News">News</a></li>
                    <li><a href="howitworks/" title="How It Works">How It Works</a></li>
                    <li><a href="careers/" title="Careers">Careers</a></li>
                    <li><a href="legal/" title="Legal">Legal</a></li>
                    <li class="long"><a href="testimonials/" title="What Our Customers Say">What Our Customers Say</a></li>
                    <li><a href="contact/" title="Contact Us">Contact Us</a></li>
                    <li class="long"><a href="rebuild/" title="Free Credit Rebuild Program">Free Credit Rebuild Program</a></li>
                    <li><a href="sitemap/" title="Sitemap">Sitemap</a></li>
                </ul>
            </div>
            <div id="news">
                <h4>Cash Advances</h4>           
                <p>When little things in life become big surprises, a cash advance can help. Whether it’s helping to make ends meet before the next payday or dealing with an immediate and unexpected expense- <strong>Allied Cash Advance</strong> can provide you with the cash you need now. </p>
            </div>
            <div id="inBrief">
                <h4>In Brief</h4>
                <p>When you run short on cash, Allied Cash Advance can help tide you over with a number of convenient product offers - Payday Loans, Title Loans, and Installment Loans. It’s fast and easy.</p>
                <p>Just find a branch near you, bring in the simple required information, and you'll have the cash you need in minutes.</p>
            </div>
            <div id="copywrite"><p>2012 Allied Cash Advance. All Rights Reserved</p></div>
            <div id="terms">
                <p>Cash advances should be used for short-term financial needs only, not as a long-term financial solution. Customers with credit difficulties should seek credit counseling. Licensed by the Department of Corporations pursuant to the California Deferred Deposit Transaction Law. Loans will be made or arranged pursuant to a Department of Corporations Finance lenders Law license. Auto equity loan customers must meet all underwriting guidelines and must prove the financial ability to repay. NM Express Credit: Small Loan Act. VA Express Credit: Loans made through open-end credit account. </p>
            </div>
            <p id="disclaimer">*Same day funds available only to customers who apply at an Allied branch location. Applications submitted online by Thursday, 8:00 p.m. EDT, typically fund on the business day following approval and origination, after all required documents are received and underwriting is completed.</p>
        </div>
    </footer>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-5871672-1");
pageTracker._setDomainName("none");
pageTracker._setAllowLinker(true);
pageTracker._trackPageview();
} catch(err) {}</script>

<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//dnn506yrbagrg.cloudfront.net/pages/scripts/0011/2082.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>

</body>
</html>