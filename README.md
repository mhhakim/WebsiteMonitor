<h3> What is it?</h3>
<p> It's a PHP based program which can monitor is your website running properly or not. This program will notify you every time via Telegram when website running status is changed. This program is not coming with a fantastic UI or any admin panel. You have to config everything manually. </p>

<h3> How does it work?</h3>
<p> You can set a keyword/text while adding website details. Every time the cron job runs, it will search that keyword in the given URL's content. If match found, everything is normal. If not matched, you should get notified. </p>

<h3>Requirements</h3>
<p> This program is written in PHP so, PHP must require. As the program runs every time by a cronjob, cron is required. And yes, this program doesn't need any database!</p>

<h3>How to setup?</h3>
<ul>
  <li> Extract the program files. </li>
  <li> Edit <b>config.php</b> & add your telegram bot token & chat ID.</li>
  <li> The <b>sites</b> directory contains all the website(which going to be monitored.)  data. </li> 
  <li> Add <b>cron.php</b> to your cronjob & set how often you want to run the monitoring program. </li>
</ul>

<h3> How to set a cron job?</h3>
<ul>
  <li> Search on Google, man. Why you are so lazy? </li>
</ul>
<h3> How I get required Telegram data?</h3>
<ul>
  <li> You already know the answer, don't you? </li>
</ul>
