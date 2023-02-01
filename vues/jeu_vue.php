<div class="Interface_jeux">


<form method="POST" action="index.php?page=jeu">
<label for="select">Quel jeux souhaitez-vous jouer ? </label><br>
  <select id="links" name="links">
  <option value="CHATGPT">CHATGPT</option>
    <option value="https://google.com">Google</option>
    <option value="https://facebook.com">Facebook</option>
    <option value="https://twitter.com">Twitter</option>
  </select>
  <input type="submit" value="Go">
</form>

<!--
<form>
<label for="select">Quel jeux souhaitez-vous jouer ? </label><br>
  <select id="links">
  <option value="CHATGPT">CHATGPT</option>
    <option value="https://google.com">Google</option>
    <option value="https://facebook.com">Facebook</option>
    <option value="https://twitter.com">Twitter</option>
  </select>
  <input type="button" value="Go" onclick="redirect()">
</form>
-->
</div>


<div class="chat-global">

    <div class="nav-top">
        <div class="location">
            <img src="images/left-chevron.svg">
            <p>Back</p>
        </div>

        <div class="utilisateur">
            <p>John Doe</p>
            <p>Active Now</p>
        </div>

        <div class="logos-call">
            <img src="images/phone.svg">
            <img src="images/video-camera.svg">
        </div>
    </div>

    <div class="conversation">
        <div class="talk left">
            <img src="images/avatar2.jpg">
            <p>Lorem ipsum dolor sit amet.</p>
        </div>
        <div class="talk right">
            <p>Lorem ipsum dolor sit amet.</p>
            <img src="images/avatar1.jpg">
        </div>
        <div class="talk left">
            <img src="images/avatar2.jpg">
            <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
        </div>
        <div class="talk right">
            <p>Lorem ipsum dolor sit amet.</p>
            <img src="images/avatar1.jpg">
        </div>
    </div>


    <form class="chat-form">

        <div class="container-inputs-stuffs">

            <div class="files-logo-cont">
                <img src="images/paperclip.svg">
            </div>

            <div class="group-inp">
                <textarea placeholder="Enter your message here" minlength="1" maxlength="1500"></textarea>
                <img src="images/smile.svg">
            </div>


            <button class="submit-msg-btn">
                <img src="images/send.svg">
            </button>
        </div>

    </form>
</div>



