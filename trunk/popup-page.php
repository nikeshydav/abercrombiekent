<?php
include("config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<!--<script type="text/javascript" src="<?php echo APP_ROOT_URL; ?>js/jquery-1.2.6.min.js"></script>-->
<script type="text/javascript" src="<?php echo APP_ROOT_URL; ?>js/jquery.js"></script>	
<script language="JavaScript1.2" type="text/javascript">
function isValidEmailAddress(emailAddress) {
 		var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
 		return pattern.test(emailAddress);
	}
	
function isNumberKey(evt)
{

var charCode = (evt.which) ? evt.which : evt.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
{
return false;
}
}
	function NotNumeric(chart) 
	{
		var regexp = /^[a-zA-Z]*$/
		return regexp.test(chart);
	}
	
	function validatecity(chart) 
	{
		var regexp = /^[a-zA-Z ]*$/
		return regexp.test(chart);
	}    


function validateform()
{
	    if ($("#title").val() == "") 
	  	{
			$("#errortitle").html("Please Select Title.");
			$("#title").focus();
			return false;
		}
	
		if ($("#fname").val() == "") 
	  	{
			$("#errorfname").html("Please enter First Name.");
			$("#fname").focus();
			return false;
		}
		if (!$("#fname").val() == "") 
	  	{
			if(!NotNumeric($("#fname").val()))
			{
				$("#errorfname").html("Please enter only alphabet.");
				$("#fname").focus();
				return false;
			}
		}
		if(!$("#fname").val() == "")
		{
			var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?";
			
			 for (var i = 0; i < document.getElementById("fname").value.length; i++)
			 {
					if (iChars.indexOf(document.getElementById("fname").value.charAt(i)) != -1) 
					{
					$("#errorfname").text("Your name has special characters. \nThese are not allowed.\n Please remove them and try again.").show().fadeOut(10000);
					//alert ("Your username has special characters. \nThese are not allowed.\n Please remove them and try again.");
					return false;
					}
			  }
		
		}
		
		if ($("#sname").val() == "") 
	  	{
			$("#errorsname").html("Please enter Surname.");
			$("#sname").focus();
			return false;
		}
		if (!$("#sname").val() == "") 
	  	{
			if(!NotNumeric($("#sname").val()))
			{
				$("#errorsname").html("Please Enter only alphabet.");
				$("#sname").focus();
				return false;
			}
		}
		if(!$("#sname").val() == "")
		{
			var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?";
			
			 for (var i = 0; i < document.getElementById("sname").value.length; i++)
			 {
					if (iChars.indexOf(document.getElementById("sname").value.charAt(i)) != -1) 
					{
					$("#errorsname").text("Your name has special characters. \nThese are not allowed.\n Please remove them and try again.").show().fadeOut(10000);
					//alert ("Your username has special characters. \nThese are not allowed.\n Please remove them and try again.");
					return false;
					}
			  }
		
		}
		if ($("#email").val() == "") 
	  	{
			$("#erroremail").html("Please enter Email.");
			$("#email").focus();
			return false;
		}
		if (!$("#email").val() == "") 
	  	{
			if(!isValidEmailAddress($("#email").val()))
			{
				$("#erroremail").html("Invalid email.");
				$("#email").focus();
				return false;
			}
		}
 		if ($("#mobile").val() == "") 
	  	{
			$("#errormobile").html("Please enter telephone no.");
			$("#mobile").focus();
			return false;
		}
		/*if(!$("#mobile").val() == "")
		{
			if(document.getElementById("mobile").value.length<7)
			{
				$("#errormobile").html("Please enter min. 7 digit no.");
				$("#mobile").focus();
				return false;
			}
		

		}*/
        if ($("#address").val() == "") 
	  	{
			$("#erroraddress").html("Please enter Address.");
			$("#address").focus();
			return false;
		}
		if ($("#city").val() == "") 
	  	{
			$("#errorcity").html("Please enter City.");
			$("#city").focus();
			return false;
		}
		if (!$("#city").val() == "") 
	  	{
			if(!validatecity($("#city").val()))
			{
				$("#errorcity").html("Please enter only alphabet.");
				$("#city").focus();
				return false;
			}
		}
		if ($("#pin").val() == "") 
	  	{
			$("#errorpin").html("Please enter Pincode.");
			$("#pincode").focus();
			return false;
		}
		if ($("#security_code13").val() == "") 
		{
			$("#err_security_code13").html("Please enter Security code.");
			$("#security_code13").focus();
			return false;
		}
		if($("#security_code13").val() != ''){
			if($("#s_code13").val()=='0'){
				$("#err_security_code13").html("Security code does not match.");
				return false;
			} else {
				$("#err_security_code13").html("");
			}
        }
		 
		 /*Close*/
		  $(document).unbind('keydown.facebox')
			$('#facebox').fadeOut(function(){
				$('#facebox .content').removeClass().addClass('content')
			})
		 
		
     }
</script> 
<script type="text/javascript">
function checkcode8(valuecode)
 {
  
	var  dataString = 'val='+valuecode;
	
	$.ajax({
		type: "GET",
		url: "<?php echo APP_ROOT_URL; ?>checkcode.php",
		data: dataString,
		cache: true,
		success: function(value)
			{  
				if(value==0){
					$("#s_code13").val(value);	
					$("#security_code13").focus();
					return false;
				} else {
				    $("#s_code13").val(value);
				    return false;
				}
				
			}
		});
 }
 
function new_captcha13()
{
var c_currentTime = new Date();
var c_miliseconds = c_currentTime.getTime();
document.getElementById('new_captcha13').src = '<?php echo APP_ROOT_URL; ?>image.php?x='+ c_miliseconds;
$("#s_code13").val(0);

}
 </script>
<!-- Google Analytics Start here -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5419456-35']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- Google Analytics End here -->
</head>

<body>
<div class="popupbox3">
<h2 class="blue14">Your details</h2>
<form action="<?php echo APP_ROOT_URL; ?>send_mail.php" method="post"  name="frm" id="frm" target="_blank">
<input type="hidden" name="filename" id="filename" value="<?php echo $_REQUEST['page']; ?>" />
<ul class="popupform">
          <li class="dottedBorder">
		  <dl>
            <dt><strong>*</strong> Title<br />
            </dt>
            <dd>
              <select class="selectmenu-b" name="title" id="title" onchange="javascript: clearField('errortitle')" >
                <option value="">Select</option>
				<option value="Mr">Mr</option>
				<option value="Ms">Ms</option>
				<option value="Dr"> Dr</option>
				<option value="Eng">Eng</option>
				<option value="Prof">Prof</option>
              </select>
              <span class="errormsg" id="errortitle"></span> </dd>
          </dl>
          <dl>
            <dt><strong>*</strong> First name<br />
            </dt>
            <dd>
              <input type="text" name="fname" id="fname" class="inptxt" maxlength="32" onchange="javascript: clearField('errorfname')" />
              <span class="errormsg" id="errorfname"></span> </dd>
          </dl>
		  <dl>
            <dt><strong>*</strong> SurName<br />
            </dt>
            <dd>
              <input type="text" name="sname" id="sname" class="inptxt" maxlength="32" onchange="javascript: clearField('errorsname')" />
              <span class="errormsg" id="errorsname"></span> </dd>
          </dl>
		  <dl>
            <dt><strong>*</strong> Email ID<br />
            </dt>
            <dd>
              <input type="text" name="email" id="email" class="inptxt" maxlength="64" onchange="javascript: clearField('erroremail')"  />
              <span class="errormsg" id="erroremail"></span> </dd>
          </dl>
		  
		  <dl>
            <dt> <strong>*</strong>Telephone<br />
            </dt> 
            <dd>
               <input type="text" name="mobile" id="mobile" class="inptxt" onKeypress="return isNumberKey(event);" maxlength="15" onchange="javascript: clearField('errormobile')" />
              <span class="errormsg" id="errormobile"></span> </dd>
          </dl>
		  <dl>
            <dt><strong>*</strong> Address<br />
            </dt>
            <dd>
              <textarea rows="" cols="" class="txtarea" name="address" id="address" maxlength="100" onchange="javascript: clearField('erroraddress')"></textarea>
              <span class="errormsg" id="erroraddress"></span> </dd>
          </dl>
		  <dl>
            <dt><strong>*</strong> City<br />
            </dt>
            <dd>
               <input type="text" name="city" id="city" class="inptxt" maxlength="32" onchange="javascript: clearField('errorcity')" />
              <span class="errormsg" id="errorcity"></span> </dd>
          </dl>
		  <dl>
            <dt><strong>*</strong> Pin Code<br />
            </dt>
            <dd>
               <input type="text" name="pin" id="pin" class="inptxt" maxlength="10" onchange="javascript: clearField('errorpin')" />
              <span class="errormsg" id="errorpin"></span> </dd>
          </dl>
		  <dl>
            <dt><strong>*</strong> Country<br />
            </dt>
            <dd>
               <select name="country" size="1" class="selectmenu-b" onchange="javascript: clearField('country')">
			     <option value="">Select Country</option>
  <option>Afghanistan</option>
  <option>�land Islands</option>
  <option>Albania</option>
  <option>Algeria</option>
  <option>American Samoa</option>
  <option>Andorra</option>
  <option>Angola</option>
  <option>Anguilla</option>
  <option>Antarctica</option>
  <option>Antigua and Barbuda</option>
  <option>Argentina</option>
  <option>Armenia</option>
  <option>Aruba</option>
  <option >Australia</option>
  <option>Austria</option>
  <option>Azerbaijan</option>
  <option>Bahamas</option>
  <option>Bahrain</option>
  <option>Bangladesh</option>
  <option>Barbados</option>
  <option>Belarus</option>
  <option>Belgium</option>
  <option>Belize</option>
  <option>Benin</option>
  <option>Bermuda</option>
  <option>Bhutan</option>
  <option>Bolivia</option>
  <option>Bosnia and Herzegovina</option>
  <option>Botswana</option>
  <option>Bouvet Island</option>
  <option>Brazil</option>
  <option>British Indian Ocean territory</option>
  <option>Brunei Darussalam</option>
  <option>Bulgaria</option>
  <option>Burkina Faso</option>
  <option>Burundi</option>
  <option>Cambodia</option>
  <option>Cameroon</option>
  <option>Canada</option>
  <option>Cape Verde</option>
  <option>Cayman Islands</option>
  <option>Central African Republic</option>
  <option>Chad</option>
  <option>Chile</option>
  <option>China</option>
  <option>Christmas Island</option>
  <option>Cocos (Keeling) Islands</option>
  <option>Colombia</option>
  <option>Comoros</option>
  <option>Congo</option>
  <option>Congo, Democratic Republic</option>
  <option>Cook Islands</option>
  <option>Costa Rica</option>
  <option>C�te d'Ivoire (Ivory Coast)</option>
  <option>Croatia (Hrvatska)</option>
  <option>Cuba</option>
  <option>Cyprus</option>
  <option>Czech Republic</option>
  <option>Denmark</option>
  <option>Djibouti</option>
  <option>Dominica</option>
  <option>Dominican Republic</option>
  <option>East Timor</option>
  <option>Ecuador</option>
  <option>Egypt</option>
  <option>El Salvador</option>
  <option>Equatorial Guinea</option>
  <option>Eritrea</option>
  <option>Estonia</option>
  <option>Ethiopia</option>
  <option>Falkland Islands</option>
  <option>Faroe Islands</option>
  <option>Fiji</option>
  <option>Finland</option>
  <option>France</option>
  <option>French Guiana</option>
  <option>French Polynesia</option>
  <option>French Southern Territories</option>
  <option>Gabon</option>
  <option>Gambia</option>
  <option>Georgia</option>
  <option>Germany</option>
  <option>Ghana</option>
  <option>Gibraltar</option>
  <option>Greece</option>
  <option>Greenland</option>
  <option>Grenada</option>
  <option>Guadeloupe</option>
  <option>Guam</option>
  <option>Guatemala</option>
  <option>Guinea</option>
  <option>Guinea-Bissau</option>
  <option>Guyana</option>
  <option>Haiti</option>
  <option>Heard and McDonald Islands</option>
  <option>Honduras</option>
  <option>Hong Kong</option>
  <option>Hungary</option>
  <option>Iceland</option>
  <option selected="selected">India</option>
  <option>Indonesia</option>
  <option>Iran</option>
  <option>Iraq</option>
  <option>Ireland</option>
  <option>Israel</option>
  <option>Italy</option>
  <option>Jamaica</option>
  <option>Japan</option>
  <option>Jordan</option>
  <option>Kazakhstan</option>
  <option>Kenya</option>
  <option>Kiribati</option>
  <option>Korea (north)</option>
  <option>Korea (south)</option>
  <option>Kuwait</option>
  <option>Kyrgyzstan</option>
  <option>Lao People's Democratic Republic</option>
  <option>Latvia</option>
  <option>Lebanon</option>
  <option>Lesotho</option>
  <option>Liberia</option>
  <option>Libyan Arab Jamahiriya</option>
  <option>Liechtenstein</option>
  <option>Lithuania</option>
  <option>Luxembourg</option>
  <option>Macao</option>
  <option>Macedonia, Former Yugoslav Republic Of</option>
  <option>Madagascar</option>
  <option>Malawi</option>
  <option>Malaysia</option>
  <option>Maldives</option>
  <option>Mali</option>
  <option>Malta</option>
  <option>Marshall Islands</option>
  <option>Martinique</option>
  <option>Mauritania</option>
  <option>Mauritius</option>
  <option>Mayotte</option>
  <option>Mexico</option>
  <option>Micronesia</option>
  <option>Moldova</option>
  <option>Monaco</option>
  <option>Mongolia</option>
  <option>Montenegro</option>
  <option>Montserrat</option>
  <option>Morocco</option>
  <option>Mozambique</option>
  <option>Myanmar</option>
  <option>Namibia</option>
  <option>Nauru</option>
  <option>Nepal</option>
  <option>Netherlands</option>
  <option>Netherlands Antilles</option>
  <option>New Caledonia</option>
  <option>New Zealand</option>
  <option>Nicaragua</option>
  <option>Niger</option>
  <option>Nigeria</option>
  <option>Niue</option>
  <option>Norfolk Island</option>
  <option>Northern Mariana Islands</option>
  <option>Norway</option>
  <option>Oman</option>
  <option>Pakistan</option>
  <option>Palau</option>
  <option>Palestinian Territories</option>
  <option>Panama</option>
  <option>Papua New Guinea</option>
  <option>Paraguay</option>
  <option>Peru</option>
  <option>Philippines</option>
  <option>Pitcairn</option>
  <option>Poland</option>
  <option>Portugal</option>
  <option>Puerto Rico</option>
  <option>Qatar</option>
  <option>R�union</option>
  <option>Romania</option>
  <option>Russian Federation</option>
  <option>Rwanda</option>
  <option>Saint Helena</option>
  <option>Saint Kitts and Nevis</option>
  <option>Saint Lucia</option>
  <option>Saint Pierre and Miquelon</option>
  <option>Saint Vincent and the Grenadines</option>
  <option>Samoa</option>
  <option>San Marino</option>
  <option>Sao Tome and Principe</option>
  <option>Saudi Arabia</option>
  <option>Senegal</option>
  <option>Serbia</option>
  <option>Seychelles</option>
  <option>Sierra Leone</option>
  <option>Singapore</option>
  <option>Slovakia</option>
  <option>Slovenia</option>
  <option>Solomon Islands</option>
  <option>Somalia</option>
  <option>South Africa</option>
  <option>South Georgia and the South Sandwich Islands</option>
  <option>Spain</option>
  <option>Sri Lanka</option>
  <option>Sudan</option>
  <option>Suriname</option>
  <option>Svalbard and Jan Mayen Islands</option>
  <option>Swaziland</option>
  <option>Sweden</option>
  <option>Switzerland</option>
  <option>Syria</option>
  <option>Taiwan</option>
  <option>Tajikistan</option>
  <option>Tanzania</option>
  <option>Thailand</option>
  <option>Togo</option>
  <option>Tokelau</option>
  <option>Tonga</option>
  <option>Trinidad and Tobago</option>
  <option>Tunisia</option>
  <option>Turkey</option>
  <option>Turkmenistan</option>
  <option>Turks and Caicos Islands</option>
  <option>Tuvalu</option>
  <option>Uganda</option>
  <option>Ukraine</option>
  <option>United Arab Emirates</option>
  <option>United Kingdom</option>
  <option>United States of America</option>
  <option>Uruguay</option>
  <option>Uzbekistan</option>
  <option>Vanuatu</option>
  <option>Vatican City</option>
  <option>Venezuela</option>
  <option>Vietnam</option>
  <option>Virgin Islands (British)</option>
  <option>Virgin Islands (US)</option>
  <option>Wallis and Futuna Islands</option>
  <option>Western Sahara</option>
  <option>Yemen</option>
  <option>Zaire</option>
  <option>Zambia</option>
  <option>Zimbabwe</option>
</select>

              <span class="errormsg" id="country"></span> </dd>
          </dl>
		  <dl>
            <dt>Security code</dt>
            <dd>
			<img border="0" class="Border" id="new_captcha13" src="<?php echo APP_ROOT_URL; ?>image.php" alt="" /> &nbsp;<a href="JavaScript: new_captcha13();" style="text-decoration:none"><img border="0" alt="" src="<?php echo APP_ROOT_URL; ?>refresh.png" align="bottom" /></a><br>
<input type="text" name="security_code13" id="security_code13"  class="inptxtsml mleft10" onkeyup="javascript:return checkcode8(this.value);"  onkeypress="javascript:return checkcode8(this.value);" onchange="javascript: clearField('err_security_code13')"/>
<input type="hidden" name="s_code13" id="s_code13" />
<span class="errormsg" id="err_security_code13"></span>
            <!--<img src="images/capcha.gif" alt="Capcha" class="Left" /><input type="text" class="inptxtsml mleft10" />-->
			</dd>
          </dl>
		  <dl>
            <dt>&nbsp;
            </dt>
            <dd><input type="image" name="submit" id="submit" src="<?php echo APP_ROOT_URL; ?>images/submit-button.gif" onclick="return validateform();" /></dd>
          </dl>		  
		  </li>      
      </ul>
</form>
</div>   
</body>
</html>
