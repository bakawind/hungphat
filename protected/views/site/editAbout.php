<h1>Edit About Content</h1>
<div class="form">
<?php
$this->layout='column2';
?>
<form method='POST' action='/site/editAbout'>
    <div class="row">
        <script type="text/javascript" src="/js/tinymce/assets/tiny_mce/tiny_mce.js"></script>
<textarea name='content'><?= isset($content) ? $content : '' ?></textarea>
        <script type="text/javascript">
            tinyMCE.init({
                    theme : "advanced",
                    mode : "textareas",
                    plugins : "phpimage,safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,spellchecker,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
                    theme_advanced_buttons3_add : "fullpage",
                    theme_advanced_buttons1: "phpimage,media,link,unlink,anchor,|,|,charmap,iespell,advhr,styleprops,|,attribs,visualchars,|",
                    theme_advanced_buttons2: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,outdent,indent,|,bullist,numlist",
                    theme_advanced_buttons3: "styleselect,formatselect,fontselect,fontsizeselect,|,code,|",
                    theme_advanced_buttons4: "",
                    extended_valid_elements: "a[name|href|target|title|onclick]",
                    theme_advanced_resizing: true,
                    relative_urls: false,
                    remove_script_host: true,
                    width: "100%",
            });
        </script>
    </div>
	<div class="row buttons"> <input type='submit' value='Save'/> </div>
</form>
</div><!-- form -->
