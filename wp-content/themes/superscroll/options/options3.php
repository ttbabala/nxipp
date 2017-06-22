<div class="xiaot"> 
                	 <?php $eso_jr = get_option('mytheme_eso_jr'); ?>  
                <label  for="eso_jr ">是否屏蔽主题自带的seo输出:</label>
                  <select name="eso_jr" id="eso_jr">
                   <option value=''<?php if ( $eso_jr ==="" ) {echo "selected='selected'";}?>>不屏蔽</option>
                    <option value='none'<?php if ( $eso_jr ==="none" ) {echo "selected='selected'";}?>>屏蔽</option>
	             </select>   
                 <p>如果你选择了屏蔽主题自带的SEO输出，那么主题自带的关键词、描述和标题将不会显示出来，这个选项是方便你使用一些插件的SEO选项而设定的，如果你没有使用相关seo插件，那么这个选项请勿选择</p>
                </div>

 <div class="up">
                    <b class="bt">首页title替换（pc）</b>
                    <textarea name="title" cols="86" rows="3" id="title"><?php echo get_option('mytheme_title'); ?></textarea>   
                    <p>默认调用的是设置--常规中的站点标题+副标题</p>
                </div> 

   <div class="up">
                    <b class="bt">网站关键字填写（pc）</b>
                    <textarea name="keywords" cols="86" rows="3" id="keywords"><?php echo get_option('mytheme_keywords'); ?></textarea>   
                    <p>请填写网站的关键字，使用“ , ”分开，一个网站的关键字一般不超过100个字符。</p>
                </div>   
                
                 <div class="up">
                    <b class="bt">网站描述填写（中文）</b>
                    <textarea name="description" cols="86" rows="3" id="description"><?php echo get_option('mytheme_description'); ?></textarea>    
                    <p>请填写网站的描述，使用,分开，一个网站的描述一般不超过200个字符。</p>
                </div>   
                
                
                
 <div class="up">
                    <b class="bt">首页title替换（移动版）</b>
                    <textarea name="title_p" cols="86" rows="3" id="title_p"><?php echo get_option('mytheme_title_p'); ?></textarea>   
                    <p>默认调用的是设置--常规中的站点标题+副标题</p>
                </div> 

   <div class="up">
                    <b class="bt">网站关键字填写（移动版）</b>
                    <textarea name="keywords_p" cols="86" rows="3" id="keywords_p"><?php echo get_option('mytheme_keywords_p'); ?></textarea>   
                    <p>请填写网站的关键字，使用“ , ”分开，一个网站的关键字一般不超过100个字符。</p>
                </div>   
                
                 <div class="up">
                    <b class="bt">网站描述填写（移动版）</b>
                    <textarea name="description_p" cols="86" rows="3" id="description_p"><?php echo get_option('mytheme_description_p'); ?></textarea>    
                    <p>请填写网站的描述，使用,分开，一个网站的描述一般不超过200个字符。</p>
                </div>   
                   

                      <div class="up">    
                    <b class="bt">网站统计代码添加</b>
                    <textarea name="analytics" cols="86" rows="4" id="analytics"><?php echo stripslashes(get_option('mytheme_analytics')); ?></textarea>    
                 
                 <a href="http://www.themepark.com.cn/wordpresswzseohj.html">网站的seo应该如何去做？ 我们给你一些文章作为参考</a>
  </div>  
  
  
  <div class="xiaot">
  
    <label  for="fenxiang">文章底部的分享代码：</label> 
              <textarea name="fenxiang" cols="86" rows="4" id="fenxiang"><?php echo stripslashes(get_option('mytheme_fenxiang')); ?></textarea>    
              <p>此处是文章内页和单页的百度分享代码替换框，若你想要使用其他的分享代码，可以获取代码粘贴到此处（如台湾、香港、澳门地区和海外地区用户不需要分享中国大陆的社交网站，可以使用此功能粘贴本地的分享代码，若不想使用此功能，可以打一些空格在里面即可）留空则显示默认的百度分享 </p>  
              
                <b class="bt">侧边栏悬浮模块设置</b><br />
                <?php $kefu_on =  get_option('mytheme_kefu_on'); ?>
                 <label  for="kefu_on">是否显示悬浮:</label>
                  <select name="kefu_on" id="kefu_on">
                   <option value=''<?php if ( $kefu_on ==="" ) {echo "selected='selected'";}?>>显示</option>
                    <option value='none'<?php if ( $kefu_on ==="none" ) {echo "selected='selected'";}?>>不显示</option>
	             </select>   
                  <div class="up">
                      <label  for="about_pic">二维码上传（尺寸：210*210）</label> 
                      <input type="text" size="40"  name="kefu_weixin" id="kefu_weixin" value="<?php echo get_option('mytheme_kefu_weixin'); ?>"/>   
                      <input type="button" name="upload_button" value="上传" id="upbottom"/>  <br /> 
                  </div> 
                    <div class="up">
                    <label  for="kefu_qq">客服qq代码添加</label>
                    <textarea name="kefu_qq" cols="86" rows="4" id="kefu_qq"><?php echo stripslashes(get_option('mytheme_kefu_qq')); ?></textarea>
                    <p>登录QQ，并且进入这个网址<a href="http://shang.qq.com/widget/consult.php" target="_blank">http://shang.qq.com/widget/consult.php</a>,将获取的代码粘贴进来，支持多个qq客服代码添加</p>
                      </div>    
               </div>