<!-- View for Mobile Only -->
<!DOCTYPE html>
<html>

<head>
  <title>Indovenue Front</title>
  <meta http-equiv="Content-Type" content="text/html" charset="windows-1252">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Open+Sans:300,400" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- START BOOTSTRAP -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" integrity="sha256-t2/7smZfgrST4FS1DT0bs/KotCM74XlcqZN5Vu7xlrw=" crossorigin="anonymous">
  <!-- END BOOTSTRAP -->
  <!--Bootstrap-slider-->
  <link rel="stylesheet" href="css/bootstrap-slider.css">
  <script type="text/javascript" src="js/bootstrap-slider.min.js"></script>
  <!-- Include Date Range Picker -->
  <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css">-->
  <!-- Include Required Prerequisites -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <!-- Include Date Range Picker -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
  <!-- START CUSTOM CSS -->
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="js/handlebars-v4.0.10.js"></script>
  <!-- CSS for message and inbox-->
  <link rel="stylesheet" type="text/css" href="css/inbox.css">
</head>

<body>
  <!-- Navbar Start-->
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="img/logo.png" style="max-height: 100%"></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right navbar-custom">
          <li><a href="#">Home</a></li>
          <li><a href="#">Tentang Kami</a></li>
          <li><a href="#">Kontak Kami</a></li>
          <li class="divider-vertical"></li>
          <!--Collapse Login for Dekstop and Tablet Start -->
          <li class="dropdown dropdown-profile">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-top:-10px;">
              <img src="img/avatar_user.jpg" class="img-circle center" width="40" height="40">
              <b class="avatar-text"> Johnny Kennedy</b>
            </a>
            <ul id="login-profile" class="dropdown-menu">
              <li><a href="#">Profile</a></li>
              <li><a href="#">My Booking</a></li>
              <li><a href="#">Inbox</a></li>
              <li><a href="#">Logout</a></li>
            </ul>
          </li>
          <!--Collapse Login for Dekstop and Tablet End -->
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
  <!-- Navbar End -->
  <div class="container" style="padding:60px 0px 0px 0px; width:100%;">
    <ul class="nav nav-tabs dashboard-tab">
      <li><a data-toggle="tab" href="">Overview</a></li>
      <li><a data-toggle="tab" href="">My Booking</a></li>
      <li class="active"><a data-toggle="tab" href="#inbox">Inbox</a></li>
    </ul>
    <div class="tab-content">
      <div id="inbox" class="tab-pane fade in active">
        <div class="container" style="padding: 20px 0px 0px 0px;">
          <div class="page__wrapper visible-xs hidden-md-up">
            <div id="inbox-wrapper">
              <div class="messages__container jsMessageContainer">
                <!-- Message example start -->
                <div class="messages__content jsMessagesContent" id="messageContent">
                  <!-- Header of Message start -->
                  <div class="message-convers__header">
                    <div class="message-header messages-item" style="padding-left:30px;padding-right:30px;">
                      <div class="message__avatar">
                        <img alt="" src="img/inf_build.jpg" class="messages-item__avatar">
                      </div>
                      <aside class="messages-item__content">
                        <div class="messages-item__name">Infinite Building</div>
                        <div class="messages-item__subject">
                          <div class="messages-subject__content">Unappalled by the massacre made …</div>
                          <div class="messages-close"><a href="inbox.html" style="color:gray;"><i class="fa fa-times-thin fa-2x" aria-hidden="true"></i></a></div>
                        </div>
                      </aside>
                    </div>
                  </div>
                  <!-- Header of Message end -->
                  <div class="comments messages__content__convers jsMsgScroll" style="height:300px;">
                    <ul id="comments__wrap" class="comments__wrap jsCommentsWrap">
                      <li class="message__item ">
                        <div class="comment__content">
                          <div class="message__bubble">I have hinted that I would often jerk poor Queequeg from between the whale and the ship where he would occasionally fall, from the incessant rolling and swaying of both.<span class="message__date jsMsgDate" data-date="April 4, 2017 4:34 PM">Apr 4 2017</span></div>
                        </div>
                      </li>
                      <li class="message__item current__user">
                        <!-- toggle class .current__user to display the message right aligned -->
                        <div class="comment__content">
                          <div class="message__bubble">But this was not the only jamming jeopardy he was exposed to. Unappalled by the massacre made upon them during the night, the sharks now freshly and more keenly allured by the before pent blood.<span class="message__date jsMsgDate" data-date="April 4, 2017 4:34 PM">Apr 4 2017</span></div>
                        </div>
                      </li>
                      <li class="message__item ">
                        <div class="comment__content">
                          <div class="message__bubble">So strongly and metaphysically did I conceive of my situation then, that while earnestly watching his motions, I seemed distinctly to perceive that my own individuality was now.<span class="message__date jsMsgDate" data-date="April 5, 2017 4:34 PM">Apr 5 2017</span></div>
                        </div>
                      </li>
                      <li class="message__item current__user">
                        <div class="comment__content">
                          <div class="message__bubble">I’ll be right there<span class="message__date jsMsgDate" data-date="April 5, 2017 4:34 PM">Apr 5 2017</span></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <!-- Message example end -->
                  <!-- Message reply start -->
                  <div class="messages__content__reply comments__bottom jsCommentContainer">
                    <div class="comments__form">
                      <div class="message__form__content comment-form-field">
                        <textarea id="message-area" class="new-comment-text message__form__content__textarea jsMessageBody" maxlength="1500" placeholder="Type your message"></textarea>
                      </div>
                      <div class="message__form__action">
                        <button class="message__form__action__button ypbtn--no-radius jsMessageSend" disabled>Send</button>
                      </div>
                    </div>
                  </div>
                  <!-- Message reply end -->
                  <!-- view for no message selected -->
                  <!--  <div class="comments messages__content__convers jsMsgScroll">
                    <div class="no_message">
                     <h1>No Message Selected</h1>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script class="jsMessageBubbleTemplate" type="text/x-handlebars-template">
    <li class="message__item current__user">
      <div class="comment__content">
        <div class="message__bubble">
          {{ messageBody }}
          <span class="message__date jsDate" data-date="{{ messageDate }}">{{ messageDate }}</span>
        </div>
      </div>
    </li>
  </script>
  <script type="text/javascript">
  // JSHINT specific settings
  /* global $YPCA, YP */
  "use strict";

  var $YPCA = jQuery.noConflict(),
    YP = window.YP || {};

  YP.MessageCenter = (function($YPCA) {
    var messageCenter = {
      settings: {
        $messageThread: $YPCA('.jsCommentsWrap'),
        $messageBody: $YPCA('.jsMessageBody'),
        $messageItemBubble: $YPCA('.jsMessageBubbleTemplate'),
        $messageButton: $YPCA('.jsMessageSend')
      },

      _init: function() {
        messageCenter._scrollMessageViewportToBottom();
        messageCenter._addEventListener();
      },

      _addEventListener: function() {
        messageCenter.settings.$messageBody.on('keyup', function(e) {
          var maxlength = $YPCA(this).attr('maxlength');

          messageCenter.settings.$messageButton.prop('disabled', $YPCA(this).val().length === 0);

          if ($YPCA(this).val().length >= maxlength) {
            e.preventDefault();
            $YPCA(this).val($YPCA(this).val().substr(0, maxlength));
            return false;
          }
        });
        $YPCA('.jsCommentContainer').on('click', '.jsMessageSend', function() {
          messageCenter._appendMessageToBody(messageCenter.settings.$messageBody.val());
          messageCenter._scrollMessageViewportToBottom();
        });
      },

      _scrollMessageViewportToBottom: function() {
        // [0] is essentially document.getElementbyId() jQuery style
        if (messageCenter.settings.$messageThread.length > 0) {
          var container = $YPCA('.jsMsgScroll')[0];
          container.scrollTop = container.scrollHeight;
        }
      },
      /**
       * Simulate "realtime" posting message visually in the conversation
       * @param body
       * @param date
       * @private
       */
      _appendMessageToBody: function(body) {
        // Retrieve the HTML from the script tag we setup in the template
        // We use the id (header) of the script tag to target it on the page
        var templateHandlebars = messageCenter.settings.$messageItemBubble.html(),
          // The Handlebars.compile function returns a function to theTemplate variable

          theTemplate = Handlebars.compile(templateHandlebars);

        messageCenter.settings.$messageThread.append(theTemplate({
          messageBody: body
        }));
        messageCenter.settings.$messageBody.val('');
        messageCenter.settings.$messageButton.attr("disabled", true);

      },
    };

    $YPCA(function() {
      messageCenter._init();
    });
  })($YPCA);
  </script>
</body>

</html>
