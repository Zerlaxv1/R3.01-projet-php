<?php
function htmlErrorMessage(string $message, string $description = '')
{
  echo "
  <div class='uk-alert uk-alert-danger'>
    <svg
      xmlns='http://www.w3.org/2000/svg'
      width='15'
      height='15'
      fill='#000000'
      viewBox='0 0 256 256'
    >
      <path
        d='M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z'
        opacity='0.2'
      ></path>
      <path
        d='M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm-8-80V80a8,8,0,0,1,16,0v56a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,172Z'
      ></path>
    </svg>
    <div class='uk-alert-title'>$message</div>";

  if ($description !== '') {
    echo "<div class='uk-alert-description'>$description</div>";
  }

  echo "</div>";
}
