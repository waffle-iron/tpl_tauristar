<?php
defined('_JEXEC') or die;

$params = JFactory::getApplication()->getTemplate(true)->params;

JLoader::import('tauristar.helpers.tauristar', JPATH_THEMES);
$user = JFactory::getUser();

JHtml::_('jquery.framework');
JHtml::_('bootstrap.framework');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
<?php
$document = JFactory::getDocument();
$cssFile = '/templates/'.$this->template.'/css/template.css';
switch ($params->get('mode', 2))
{
	case 1:
		if (!JFile::exists(JPATH_BASE . $cssFile))
		{
			TauristarHelper::compile();
		}
		$document->addStyleSheet(JUri::base() . $cssFile);
		break;
	case 2:
		TauristarHelper::compile();
		$document->addStyleSheet(JUri::base() . $cssFile);
		break;
	case 3:
		$document->addScript(JUri::base().'/templates/'.$this->template.'/js/less.js');
		echo '<link rel="stylesheet/less" type="text/css" href="' . JUri::base() . '/templates/' . $this->template . '/less/template.less" />';
		echo '<script type="text/javascript">less = { env: "development"};</script>';
		break;
}
?>

<jdoc:include type="head" />
</head>

<body>
	<div id="header">
		<div class="container">
			<a class="pull-left" href="<?php echo JFactory::getURI()->base()?>">
				<jdoc:include type="modules" name="logo" style="none" />
			</a>

			<nav class="navbar navbar-default navbar-fixed-top">
		      <div class="container">
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="navbar-brand" href="#">Project name</a>
		        </div>
		        <div id="navbar" class="navbar-collapse collapse">
		          <ul class="nav navbar-nav">
		            <li class="active"><a href="#">Home</a></li>
		            <li><a href="#about">About</a></li>
		          </ul>
		        </div>
		        <div id="navbar-menu" class="navbar-collapse collapse navbar-right">
	            	<jdoc:include type="modules" name="menu" style="none" /></div>
		        </div>
		      </div>
		    </nav>

			<div class="pull-right">
				<div class="pull-right" id="login-button">
					<?php if ($user->guest)
					{?>
						<form action="<?php echo JRoute::_('index.php?option=com_users&view=login', true, true)?>" method="post" class="pull-right link-button">
							<input type="hidden" name="return" value="<?php echo base64_encode(JURI::getInstance(JFactory::getURI()->toString(array('path', 'query', 'fragment'))));?>"/>
							<input type="submit" class="btn btn-inverse pull-right link-button" value="<?php echo JText::_('JLOGIN');?>"/>
						</form>
						<?php
						$usersConfig = JComponentHelper::getParams('com_users');
						if ($usersConfig->get('allowUserRegistration'))
						{?>
							<form action="<?php echo JRoute::_('index.php?option=com_users&view=registration', true, true)?>" method="post" class="pull-right link-button">
								<input type="hidden" name="return" value="<?php echo base64_encode(JURI::getInstance(JFactory::getURI()->toString(array('path', 'query', 'fragment'))));?>"/>
								<input type="submit" class="btn btn-inverse pull-right link-button" value="<?php echo JText::_('TPL_TAURISTAR_SIGN_UP'); ?>"/>
							</form>
						<?php
						}
					}
					else
					{ ?>
						<a class="btn btn-inverse btn-mini link-button" href="<?php echo JRoute::_('index.php?option=com_users&task=user.logout&return=Lw&'.JSession::getFormToken().'=1')?>">Logout</a>
					<?php
					} ?>
				</div>
			</div>
		</div>
	</div>

    <?php
    if ($this->countModules('top'))
    { ?>
    <div id="top">
        <div class="container">
			<div class="row-fluid">
				<jdoc:include type="modules" name="top" style="xhtml" />
			</div>
            <div class="clr"></div>
		</div>
	</div>
    <hr class="soften">
    <?php
    } ?>
    <div id="bodysection">
    	<div class="container">
      		<div class="row-fluid">
            	<?php
            	$left = $this->countModules('sidebar-left');
            	$right = $this->countModules('sidebar-right');
            	$sidebarWidth = $params->get('sidebar-width', 2);
            	$contentSpan = $right ? 12 - $sidebarWidth : 12;
            	$contentSpan = $left ? $contentSpan - $sidebarWidth : $contentSpan;
            	if ($left)
            	{ ?>
                <div class="span<?php echo $sidebarWidth?>">
                	<jdoc:include type="modules" name="sidebar-left" style="xhtml" />
                </div>
                <?php
            	} ?>
                <div class="content span<?php echo $contentSpan?>">
                	<div class="row-fluid">
                		<jdoc:include type="message" />
                		<jdoc:include type="component" />
                	</div>
                </div>
                <?php if ($right)
                { ?>
                <div class="span<?php echo $sidebarWidth?>">
                	<jdoc:include type="modules" name="sidebar-right" style="xhtml" />
                </div>
                <?php
                } ?>
            </div>
    	</div>
	</div>
    <?php
    if ($this->countModules('breadcrumbs'))
    { ?>
	<div id="breadcrumbs">
	    <div class="container">
		  <div class="row-fluid">
		    <div class="span12">
		      <jdoc:include type="modules" name="breadcrumbs" />
		    </div>
		  </div>
		</div>
	</div>
    <?php
    }
    if ($this->countModules('bottom'))
    { ?>
    <div id="bottom">
        <div class="container">
			<div class="row-fluid">
				<jdoc:include type="modules" name="bottom" style="html5"/>
			</div>
            <div class="clr"></div>
		</div>
	</div>
    <?php
    } ?>
    <footer id="footer">
    	<div class="container">
	    <?php if ($this->countModules('footer'))
	    { ?>
			<div class="row-fluid">
				<jdoc:include type="modules" name="footer" style="xhtml" />
			</div>
	    <?php
	    } ?>
		<p>Copyright &copy; <?php echo date('Y'); ?> - <?php echo JFactory::getApplication()->getCfg('sitename'); ?></p>
		</div>
    </footer>
</body>
</html>
