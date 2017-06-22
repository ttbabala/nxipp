   <?php 
session_start();
 if(isset($_POST['mail_stp'])) {	
      $mail_error = '';
	 
	  $mail_ame = trim( $_POST['mail_ame'] );
	  $mail_phone = trim( $_POST['mail_phone'] ) ;
	  $mail_email= trim( $_POST['mail_email'] ) ;
	  $mail_text = trim( $_POST['mail_text'] ) ;
	 $mail_yzm2 =trim( $_POST['mail_yzm2'] ) ;
      if ( $mail_ame == '' ) {
        $mail_error .= '错误：请输入姓名。<br />';
      } 
	
      // Check the e-mail address
      if ( $mail_email == '' ) {
       $mail_error .= '错误：请填写电子邮件地址。<br />';
      }  
	  
	    
	   if (  $mail_phone == '' ) {
          $mail_error .= '错误：请输入联系电话。<br />';
      }  
	 if($_SESSION['VCODE'] !=$mail_yzm2){
   $mail_error .= '错误：验证码错误！<br />'.$_SESSION['VCODE']; }
   
   if( $mail_yzm2== ''){ $mail_error .= '错误：验证码不能为空！<br />';}
	 
	   if (  $mail_text == '' ) {
        $mail_error .= '错误：至少和我们说点什么吧！<br />';
      } 

		  
$emailTo = get_option('admin_email');
$site_name =get_bloginfo('name');


  $message = __('用户:'.$mail_ame) . "\r\n\r\n";   
  $message .= get_option('siteurl') . "\r\n\r\n";   
  $message .= __('用户邮箱:'.$mail_email) . "\r\n\r\n";   
  $message .= __('联系电话：'.$mail_phone) . "\r\n\r\n";   
  $message .= __('留言内容:'.$mail_text) . "\r\n\r\n";   

if (empty($mail_error)&& $message && !wp_mail($emailTo, '有用户提交了留言', $message) ) {   
                
				  $Success= "邮件发送成功";    
               
        } else {   
           
            $mail_error.=  "";  
        }   
 } 


	$word_t17=get_option('mytheme_word_t17');
	$word_t19=get_option('mytheme_word_t19');
	$word_t21=get_option('mytheme_word_t21');
	$word_t28=get_option('mytheme_word_t28');
	$word_t29=get_option('mytheme_word_t29');
 ?>
 <script src="<?php bloginfo('template_url'); ?>/js/jquery.form.js"></script> 
    <script type="text/javascript">
	<?php if(is_home()){?>     
$(document).ready(function() { 
 $('.ludou_reg #wp-submit').click(function() { 
     $('.tishi2').fadeIn('500');
	var uname = $("#mail_ame").val();  
	var mail_phone = $("#mail_phone").val();
	var mail_email = $("#mail_email").val();
	var mail_text = $("#mail_text").val();
	var mail_yzm2 = $("#mail_yzm2").val(); 
if(uname =="") { $(".tishi3").html("姓名不能为空！");
        setTimeout("$('.tishi2').fadeOut('slow')",1000); return false; 
    } else if(mail_phone =="") { $(".tishi3").html("电话不能为空！");
       setTimeout("$('.tishi2').fadeOut('slow')",1000); return false; 
    } else if(! mail_phone.match(/^(((1[0-9][0-9]{1}))+\d{8})$/)) { $(".tishi3").html("手机号码格式不正确！");
       setTimeout("$('.tishi2').fadeOut('slow')",1000); return false;
    }else if(mail_email =="") { $(".tishi3").html("邮箱不能为空！");
         setTimeout("$('.tishi2').fadeOut('slow')",1000); return false;
    }else if(! mail_email.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/))  { $(".tishi3").html("邮箱格式不正确！");
         setTimeout("$('.tishi2').fadeOut('slow')",1000);  return false;
    }else if(mail_yzm2 =="") { $(".tishi3").html("验证码不能为空！");
        setTimeout("$('.tishi2').fadeOut('slow')",1000);  return false;
    }else if(mail_text =="") { $(".tishi3").html("内容不能为空！");
        setTimeout("$('.tishi2').fadeOut('slow')",1000);  return false;
    }else{$(".tishi3").html("正在发送");
	  
	var options = {
	
	    success: function() {
			 $(this).ajaxSubmit();
             $('.tishi').fadeIn('500');
			 setTimeout("$('.tishi2').fadeOut('slow')",3000);
			 setTimeout("$('.tishi').fadeOut('slow')",3000);
			    
	    },
		error: function() { 
		$('.tishi2').fadeOut('slow');
		alert("填写错误，重新填写！"); return false;
		                   
		 } 
		};
 
		    $('form.ludou_reg').ajaxForm(options); 
	
	 }  
  
   });  
 
       
        }); 
	<?php }else{ ?>
	
	
$(document).ready(function() { 
        
      
        
$('.ludou_reg #wp-submit').click(function() { //When trigger is clicked...   
     $('.tishi2').fadeIn('500');
	
	 
	var uname = $("#mail_ame").val();  
	var mail_phone = $("#mail_phone").val();
	var mail_email = $("#mail_email").val();
	var mail_text = $("#mail_text").val();
	var mail_yzm2 = $("#mail_yzm2").val(); 

if(uname =="") { $(".tishi3").html("姓名不能为空！");
        setTimeout("$('.tishi2').fadeOut('slow')",1000); return false; 
    } else if(mail_phone =="") { $(".tishi3").html("电话不能为空！");
       setTimeout("$('.tishi2').fadeOut('slow')",1000); return false; 
    } else if(! mail_phone.match(/^(((1[0-9][0-9]{1}))+\d{8})$/)) { $(".tishi3").html("手机号码格式不正确！");
       setTimeout("$('.tishi2').fadeOut('slow')",1000); return false;
    }else if(mail_email =="") { $(".tishi3").html("邮箱不能为空！");
         setTimeout("$('.tishi2').fadeOut('slow')",1000); return false;
    }else if(! mail_email.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/))  { $(".tishi3").html("邮箱格式不正确！");
         setTimeout("$('.tishi2').fadeOut('slow')",1000);  return false;
    }else if(mail_yzm2 =="") { $(".tishi3").html("验证码不能为空！");
        setTimeout("$('.tishi2').fadeOut('slow')",1000);  return false;
	}else if(mail_text =="") { $(".tishi3").html("内容不能为空！");
        setTimeout("$('.tishi2').fadeOut('slow')",1000);  return false;
    }else{$(".tishi3").html("正在发送");
	  
	var options = {
	
	    success: function() {
			 $(this).ajaxSubmit();
             $('.tishi').fadeIn('500');
			 setTimeout("$('.tishi2').fadeOut('slow')",3000);
			 setTimeout("$('.tishi').fadeOut('slow')",3000);
			    
	    },
		error: function() { 
		$('.tishi2').fadeOut('slow');
		alert("填写错误，重新填写！"); return false;
		                   
		 } 
		};
 
		    $('form.ludou_reg').ajaxForm(options); 
	
	 }  
  
   });  
 
       
        }); 
	<?php } ?>
	
		
 </script> 

 <div class="tishi2">
<p class="tishi">发送成功！</p>
<p class="tishi3"></p>

</div>
 <?php $a=rand(0,10); $b=rand(0,10);  ?>
   <?php if(!empty($mail_error)) {
  echo ' <script>alert("'.$mail_error.'") </script>';
}

 if(!empty( $Success )) {
	  echo ' <script>alert("'.$Success.'") </script>';
 
}?>
<form name="mailform" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" class="ludou_reg">
    <p>
      <label for="mail_ame"><?php if($word_t17!=""){echo $word_t17;}else{echo '姓  名：';}  ?>*</label>
        <input type="text" name="mail_ame" id="mail_ame" class="input" value="" size="20" />
      
    </p>
    <p>
      <label for="mail_phone"><?php if($word_t28!=""){echo $word_t28;}else{echo '电 话';}  ?>*</label>
        <input type="text" name="mail_phone" id="mail_phone" class="input" value="" size="25" />
      
    </p>
   
    <p>
      <label for="mail_email"><?php if($word_t19!=""){echo $word_t19;}else{echo '邮 箱 ';}  ?>*</label>
        <input  type="text" name="mail_email" id="mail_email" class="input" value="" size="25" />
      
    </p>
    
     <p>
      <label for="mail_yzm"><?php if($word_t33!=""){echo $word_t33;}else{echo '验证码： ';}  ?></label>
    <em id="code" style=" float:left; width:304px; color:#ccc; font-size:12px; " >   <img src="<?php echo get_bloginfo('template_url').'/index/code.php' ?>"></em>
 
        <input style=" margin-left:55px;" type="text" name="mail_yzm2" id="mail_yzm2" class="input" value="" size="10" />
  
      
    </p>
   
       <p class="tex">
      <label for="mail_text"><?php if($word_t21!=""){echo $word_t21;}else{echo '留　言:';}  ?>*</label>
      <textarea id="mail_text" cols="30" rows="5" name="mail_text"></textarea>
       
    </p>
   
   
    <p class="submit">
      <input type="hidden" name="mail_stp" value="ok" />
      <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php if($word_t29!=""){echo $word_t29;}else{echo '发送邮件';}  ?>" />
    </p>
   
    
</form>