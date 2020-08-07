<?php

function htmlinputtext($nom,$validacio,$etiqueta,$placeholder) {
echo <<<HDS
				<div class="wrap-input100 validate-input" data-validate="$validacio">
					<span class="label-input100">$etiqueta</span>
					<input class="input100" type="text" name="$nom" placeholder="$placeholder">
					<span class="focus-input100"></span>
				</div>
HDS;
}

function htmlbuttonsubmit($text) {
echo <<<HDS
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" type='submit'>
							<span>
								$text
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
HDS;
}

function htmlbuttonleftlink($text,$url) {
echo <<<HDS
  <a href="$url">
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							<span>
								$text
								<i class="fa fa-long-arrow-left m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
 </a>
HDS;
}

function htmlbuttonrightlink($text,$url) {
echo <<<HDS
  <a href="$url">
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							<span>
								$text
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
 </a>
HDS;
}

function htmltitle($text) {
echo <<<HDS
				<span class="contact100-form-title">
					$text
				</span>
HDS;
}  


  
?>