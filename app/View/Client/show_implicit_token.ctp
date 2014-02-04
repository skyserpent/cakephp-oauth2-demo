    <?php echo $this->element('links'); ?>    
    
    <h3 class="text-center">Token Retrieved!</h3>

    <pre class="text-center"><code>  Access Token: <span id="access_token_display"><a onclick="showAccessToken();">(click here to pull from URL fragment)</a></span> </code></pre>

<p class="text-center">The following code snippet will be run to pull the token data from the URL fragment:</p>
    <pre style="display:none">
<code> <div style="width:420px;margin:0 auto;"> // function to parse fragment and return access token
  function getAccessToken() {
      var queryString = window.location.hash.substr(1);
      var queries = queryString.split("&");
      var params = {}
      for (var i = 0; i < queries.length; i++) {
          pair = queries[i].split('=');
          params[pair[0]] = pair[1];
      }

      return params.access_token;
  };</div></code></pre>

    <div id="request_resource" class="text-center" style="display:none">

        <p>
            Now use this token to make a request to the OAuth2.0 Server's APIs:
        </p>

        <div class="text-center"><a class="button" href="http://localhost/oauthapp/server/resource" onclick="this.href += '?token=' + window.params.access_token;">Click here to make a resource request</a></div><br>

        <div class="help text-center"><em>This token can now be used multiple times to make API requests for this user.</em></div>

    </div>

    <div class="text-center"><a href="{{ path('homepage') }}">Go Home</a></div>

    <!-- Javascript for pulling the access token from the URL fragment -->
    <script>
        function getAccessToken() {
            var queryString = window.location.hash.substr(1);
            var queries = queryString.split("&");
            var params = {}
            for (var i = 0; i < queries.length; i++) {
                pair = queries[i].split('=');
                params[pair[0]] = pair[1];
            }

            return params.access_token;
        };

        // show the token parsed from the fragment, and show the next step
        var showAccessToken = function (e) {
            document.getElementById('access_token_display').innerHTML = getAccessToken();
            document.getElementById('request_resource').style.display = 'block';
        }
    </script>
