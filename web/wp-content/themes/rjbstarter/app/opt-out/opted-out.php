<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Rjbstarter Opt Out - Failure</title>
  <meta name="description" content="Rjbstarter Opt Out - Failure Iframe Page">
  <meta name="author" content="Rjbstarter">
  <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>


  <style>
    *, *:before, *:after {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }

    body {
      font-family: arial, sans-serif;
      font-weight: 100;
      padding: 0;
      margin: 0;
    }

    body a {
      transition: all .25s linear;
    }

    a:focus, a:active, a:visited {
      outline: none;
    }

    p:first-child {
      padding-top: 0;
      margin-top: 0;
    }

    p:last-child {
      padding-bottom: 0;
      margin-bottom: 0;
    }

    .container, .container-fluid {
      padding: 0;
      position: relative;
      width: 100%;
      max-width: 1190px;
      margin: 0 auto;
    }

    .top-section {
      display: flex;
      justify-content: flex-start;
      padding: 0 20px;
    }
    .icon-wrapper {
      flex: 0 0 30px;
      width: 30px;
      height: 30px;
      max-width: 30px;
    }
    .msg-wrapper {
      flex: 1;
      max-width: 100%;
      padding-top: 2px;
    }

    .icon-info {
      display: block;
      width: 20px;
      height: 20px;
      background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzNyIgaGVpZ2h0PSIzNyI+PHBhdGggZmlsbD0ibm9uZSIgc3Ryb2tlPSIjZmZmIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgZD0iTTM2IDE4LjVDMzYgMjguMTY1IDI4LjE2MiAzNiAxOC41IDM2IDguODMyIDM2IDEgMjguMTY1IDEgMTguNSAxIDguODM0IDguODMyIDEgMTguNSAxIDI4LjE2MiAxIDM2IDguODM0IDM2IDE4LjV6Ii8+PHBhdGggZmlsbD0iI2ZmZiIgZD0iTTE2LjE5MiAxNi4wODJoNC41NjV2MTIuMTc0aC00LjU2NXpNMTYuMTkyIDEwLjIzNGMwLS41NS40NS0xIDEtMWgyLjU2NWMuNTUgMCAxIC40NSAxIDFWMTIuOGMwIC41NS0uNDUgMS0xIDFoLTIuNTY1Yy0uNTUgMC0xLS40NS0xLTF2LTIuNTY2eiIvPjwvc3ZnPg==);
      background-size: contain;
      background-repeat: no-repeat;
    }

    .opt-strip__switch-toggle {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 29px;
      margin: 0 7px;
      border: 2px solid #e1e4e7;
      background-color: #e1e4e7;
      cursor: pointer;
      vertical-align: middle;
      -webkit-border-radius: 27px;
      -moz-border-radius: 27px;
      border-radius: 27px;
    }

    .opt-strip__switch-toggle span {
      position: absolute;
      top: 0;
      right: 31px;
      display: inline-block;
      width: 25px;
      height: 25px;
      background-color: white;
      -webkit-border-radius: 50%;
      -moz-border-radius: 50%;
      border-radius: 50%;
      -webkit-transition: all 100ms ease-in-out 0ms;
      -moz-transition: all 100ms ease-in-out 0ms;
      transition: all 100ms ease-in-out 0ms;
    }

    .opt-strip__inner {
      margin: 0 auto;
      padding: 0;
    }

    .opt-strip__switch-label {
      color: #545d6f;
      /* color: #a5afb4; */
    }

    .opt-strip__switch {
      padding: 40px 0;
      text-align: center;
    }

    .message {
      padding: 20px 0;
      color: white;
      font-size: 16px;
      line-height: 17px;
    }

    .message--success {
      background-color: #00cc66;
    }

    .message--warning {
      background-color: #f9a90c;
    }

    .opt-strip {
      border: none;
      background-color: #ebebeb;
    }

    .opt-strip__switch-toggle{position:relative;display:inline-block;width:60px;height:29px;margin:0 7px;border:2px solid #e1e4e7;background-color:#e1e4e7;cursor:pointer;vertical-align:middle;-webkit-border-radius:27px;-moz-border-radius:27px;border-radius:27px}
    .opt-strip__switch-toggle span{position:absolute;top:0;right:31px;display:inline-block;width:25px;height:25px;background-color:white;-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;-webkit-transition:all 100ms ease-in-out 0ms;-moz-transition:all 100ms ease-in-out 0ms;transition:all 100ms ease-in-out 0ms}
    .active .opt-strip__switch-toggle span{right:0}


    @media (min-width: 544px) {
      .icon-info {
        width: 30px;
        height: 30px;
      }

      .icon-wrapper {
        flex: 0 0 40px;
        width: 40px;
        height: 40px;
        max-width: 40px;
      }

      .msg-wrapper {
        padding-top: 8px;
      }
    }

    @media (min-width:768px) {}

    @media (min-width:992px) {}
  </style>
</head>

<body>
  <section class="opt-strip">
    <div class="container">
      <div class="grid-row">
        <div class="opt-strip__inner">
          <div class="message message--warning">
            <div class="top-section">
              <div class="icon-wrapper">
                <i class="icon-info"></i>
              </div>
              <div class="msg-wrapper">
                <p>You are opted out of interest-based advertising from Rjbstarter.</p>
              </div>
            </div>
          </div>
          <div class="opt-strip__switch active">
            <a id="opt-in-link" class="opt-strip__switch-label" onclick="return optIn();" href="//pixel.quantserve.com/optout_iab?action=optin&amp;token=qc.com" target="_top">Not Opted Out</a>
            <span class="opt-strip__switch-toggle"><span></span></span>
            <span class="opt-strip__switch-label">Opt Out</span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div id="opt-in-holder" style="display: none;">&nbsp;</div>

  <script>
    function optIn() {
      var l = document.getElementById('opt-in-link');
      document.getElementById('opt-in-holder').innerHTML = ('<iframe src="'+l.href+'"></iframe>');
      setTimeout(reloadStatus, 2000);
      return false;
    }
    function reloadStatus() {
      window.location.href = '//pixel.quantserve.com/optout?token=qc.com\u0026participant_id=1\u0026rd='+location.protocol+'//'+location.hostname+'\u0026action_id=2';
    }
    $(document).ready(function(){
      var $this = $('.opt-strip__switch'),
          $toggle = $('.opt-strip__switch-toggle', $this),
          $label = $('a.opt-strip__switch-label', $this),
          clicked = false;
      $toggle.on('click', function(e){
        if($this.hasClass('active')){
          $this.removeClass('active');
          $label.click();
          clicked = true;
        }
        e.preventDefault();
      });
      $label.on('click', function(e){
        if(clicked){
          e.preventDefault();
        }
      })
    });
  </script>
</body>
</html>
