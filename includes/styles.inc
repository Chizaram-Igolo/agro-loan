<link rel = "stylesheet" type = "text/css" href = "./styles/styles.css" /> 
<link rel = "stylesheet" type = "text/css" href = "./styles/forms.css" />
<link rel = "stylesheet" type = "text/css" href = "./styles/index.css" />
<?php if(strstr($_SERVER['PHP_SELF'], "about") || strstr($_SERVER['PHP_SELF'], "index")) { ?> 
  <link rel = "stylesheet" type = "text/css" href = "./styles/index.css" />
<?php } ?>
	<?php if(strstr($_SERVER['PHP_SELF'], "about")) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/others.css" />
	<?php } ?>
	<?php if(strstr($_SERVER['PHP_SELF'], "register") || strstr ($_SERVER['PHP_SELF'], "register_two") || strstr ($_SERVER['PHP_SELF'], "admc7eje0elad") || strstr ($_SERVER['PHP_SELF'], "sign_in") || strstr($_SERVER['PHP_SELF'], "about") || strstr($_SERVER['PHP_SELF'], "contact") || strstr ($_SERVER['PHP_SELF'], "success") || strstr ($_SERVER['PHP_SELF'], "error") || strstr ($_SERVER['PHP_SELF'], "404") || strstr ($_SERVER['PHP_SELF'], "failure")) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/register.css" />
		<style type = "text/css">
		</style>
	<?php } ?>
	<?php if(strstr($_SERVER['PHP_SELF'], "privacy_policy")) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/others.css" />
	<?php } ?>
	<?php if(strstr($_SERVER['PHP_SELF'], "terms") ) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/others.css" />
	<?php } ?>
	<?php if(strstr($_SERVER['PHP_SELF'], "terms") || strstr ($_SERVER['PHP_SELF'], "privacy_policy")) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/terms.css" />
	<?php } ?>
	<?php if(strstr($_SERVER['PHP_SELF'], "user_profile") ||
             strstr($_SERVER['PHP_SELF'], "slate") ||
             strstr($_SERVER['PHP_SELF'], "history") ||			 
			 strstr($_SERVER['PHP_SELF'], "edit_profile") || 
			 strstr($_SERVER['PHP_SELF'], "list_profile") || 
			 strstr($_SERVER['PHP_SELF'], "notification") ||
			 strstr($_SERVER['PHP_SELF'], "private_message") ||
			 strstr($_SERVER['PHP_SELF'], "posse") ||
			 strstr($_SERVER['PHP_SELF'], "private_message") ||
			 strstr($_SERVER['PHP_SELF'], "posts") ||
			 strstr($_SERVER['PHP_SELF'], "create") ||
			 strstr($_SERVER['PHP_SELF'], "loan_application") ||
			 strstr($_SERVER['PHP_SELF'], "preview") ||
			 strstr($_SERVER['PHP_SELF'], "settings") ||
			 strstr($_SERVER['PHP_SELF'], "ask_a_question") || 
             strstr($_SERVER['PHP_SELF'], "stats") ||
             strstr($_SERVER['PHP_SELF'], "projects") ||
             strstr($_SERVER['PHP_SELF'], "answer") ||
             strstr($_SERVER['PHP_SELF'], "reply")) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/user_profile.css" />
	<?php } ?>
    <?php if(strstr($_SERVER['PHP_SELF'], "slate") ||
	         strstr($_SERVER['PHP_SELF'], "history") ||
			 strstr($_SERVER['PHP_SELF'], "posts") ||
			 strstr($_SERVER['PHP_SELF'], "private_message") || 
			 strstr($_SERVER['PHP_SELF'], "list_profile") ||
			 strstr($_SERVER['PHP_SELF'], "notification") ||
			 strstr($_SERVER['PHP_SELF'], "create") ||
			 strstr($_SERVER['PHP_SELF'], "loan_application") ||
			 strstr($_SERVER['PHP_SELF'], "preview") ||
			 strstr($_SERVER['PHP_SELF'], "settings") ||
			 strstr($_SERVER['PHP_SELF'], "ask_a_question") ||
			 strstr($_SERVER['PHP_SELF'], "choose_project_posse") ||
             strstr($_SERVER['PHP_SELF'], "answer") ||
             strstr($_SERVER['PHP_SELF'], "reply")){ ?> 
      <link rel = "stylesheet" type = "text/css" href = "./styles/page_format_user.css" /> 
	<?php } ?>
	<?php if(strstr($_SERVER['PHP_SELF'], "successful")) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/successful.css" />
	<?php } ?>
	<?php if(strstr($_SERVER['PHP_SELF'], "slate") ||
	         strstr($_SERVER['PHP_SELF'], "history") ||
	         strstr($_SERVER['PHP_SELF'], "edit_profile")||
			 strstr($_SERVER['PHP_SELF'], "create") ||   
			 strstr($_SERVER['PHP_SELF'], "list_profile") ||
			  strstr($_SERVER['PHP_SELF'], "loan_application") ||
			 strstr($_SERVER['PHP_SELF'], "preview") ||
			 strstr($_SERVER['PHP_SELF'], "settings") ||
			 strstr($_SERVER['PHP_SELF'], "ask_a_question") ||
			 strstr($_SERVER['PHP_SELF'], "answer") ||
             strstr($_SERVER['PHP_SELF'], "reply")) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/edit_profile.css" />
	<?php } ?>
    <?php if(strstr($_SERVER['PHP_SELF'], "slate") ||
	         strstr($_SERVER['PHP_SELF'], "history") ||
	         strstr($_SERVER['PHP_SELF'], "list_profile") ||
	strstr($_SERVER['PHP_SELF'], "create") ||
	 strstr($_SERVER['PHP_SELF'], "loan_application") ||
	strstr($_SERVER['PHP_SELF'], "preview") ||
			 strstr($_SERVER['PHP_SELF'], "ask_a_question") ||
			 strstr($_SERVER['PHP_SELF'], "answer") ||
             strstr($_SERVER['PHP_SELF'], "reply") ||
             strstr($_SERVER['PHP_SELF'], "private_message")) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/create_options.css" />
	<?php } ?>
	<?php if(strstr($_SERVER['PHP_SELF'], "ea3")) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/list_profiles.css" />
	<?php } ?>
	<?php if(strstr($_SERVER['PHP_SELF'], "private_message")) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/private_message.css" />
	<?php } ?>
	<?php if(strstr($_SERVER['PHP_SELF'], "posts") ||
             strstr($_SERVER['PHP_SELF'], "answer") ||
             strstr($_SERVER['PHP_SELF'], "reply")) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/posts.css" />
	<?php } ?>
    <?php if(strstr($_SERVER['PHP_SELF'], "notifications")) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/notifications.css" />
	<?php } ?>
    <?php if(strstr($_SERVER['PHP_SELF'], "stats")) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/stats.css" />
	<?php } ?>
	<?php if(strstr($_SERVER['PHP_SELF'], "settings")) { ?> 
    <link rel = "stylesheet" type = "text/css" href = "./styles/settings.css" />
	<?php } ?>