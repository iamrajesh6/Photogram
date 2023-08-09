<?php
$signup=false;
if(isset($_POST['username']) and isset($_POST['phone']) and isset($_POST['mail']) and isset($_POST['pass'])) {

    $user = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['mail'];
    $pass = $_POST['pass'];
    $error = user::signup($user, $phone, $email, $pass);
    $signup = true;
}

if($signup) {
    if(!$error) {?>
<main class="container">
	<div class="bg-light p-5 rounded mt-3">
		<h1>Sign up!!!</h1>
		<p class="lead">Welcome Gentleman</p>
		<a class="btn btn-lg btn-primary" href="login.php" role="button">Return to Login</a>
	</div>
</main>
<?php
    } else {
        ?>
<main class="container">
	<div class="bg-light p-5 rounded mt-3">
		<h1>Sign up!!!</h1>
		<p class="lead">Sign up Failed<?=$error?></p>
		<a class="btn btn-lg btn-primary" href="<?get_config('base_path')?>signup.php" role="button">Return to
			Signup</a>
	</div>
</main>
<?php
    }
} else {

    ?>
<main class="form-signup">

	<form method="post" action="signup.php">
		<img class="mb-4"
			src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHoAAAB6CAMAAABHh7fWAAABvFBMVEX///8AAABOTlAYndWMt0H57zbfIib8rkKEKYlSUlSjo6Tc3N2pqanU1NRWVlimpqZHR0mysrLn5+fy8vJnizldIyORkZEqZGZNaSd3nTmvLCmPLSfRJybFKSclJSX5+fmGrj8/Pz83NzjBwcEODg6ZmZqAgIHD3/Du4zVzc3T1qkNqamt8KYGJiYrgLS7Ly8uAGYUbkb8Vao1xLHZmLGrcAAC7eTDeljrpnz4YGBouLi7Y7Pe10+SJtctbkKpDdIuASo2ZUp6eXqK0hrfNsNDp2utuuuIGg7EsSXOtebDey+BAo9MDXnliNnoeTm5POnU5P2ppDG9aC18AOl1TJVh6UWQAV17C0tuznrs3Kk24AAD5tLNlfU52KD/jR0jR3MRchCP6xcCYs2ymvYiOJjLmW130+etFJ0H34uLD1Z2hJCxZJDTwkJCnx3LO3riZvVt1V3h2JSkpESK3aGiIcjWAiDGQZhXNuICBWyalgirHrCh8dCu8njHi0Uvbxinx8Lj07penEgrXpaP38oCzfHmKHBNVAACnj42DOgCqYgDIfRPn28muiwKWUyT/4b3bz43/yYb/+tf99WrgoVdp3y5wAAAHb0lEQVRoge2Y/7/TVhnHc07Xymmac0/OmdEpNEvTZM0NJWXsbrYw59gYA9kXJxvcMXVMqaA4/IqAjE3RqZvDy/yHfZ6TNElLKb7uTV/+sHx+6Jfk6Xmf59vpyTGMWrVq1apVq1atWrVq1ar1/5TqBKANWbrkStPvtIN2xzelu0Z0IBhIRDnXCiJOBUUJwaPAWhvd0ZQZWtmxYJzBFZgPvnIm4g21HrRrt0HZ6B1GgSVCOzGllGZihwJmQunGetiFEgBTEZju0WPPf/eF7714/KWXTxgyEHCVJVXDTKskR3DKO+7RVxqNwydPPv3qSOvUadeG68Ipm5p7BScxoyVBZAP51PcbqMMnnz7z2j7UaPTiaRVQPmfKY39P5A1RGo9zzniCHjdm7Nf3ZRodP5HAXc5LsxTtvfgM8R3amdpAjtWxRqOEPvNGzh69LCMo9vbMfAgZ2IPf0L3Fr0PGYuOVRkmQ7TMH9+Xwl1xg582P84523e+SszD/MoQQzpO122/uK9inDAj4sDRXKpcN+7/IZEW3+pBqNU9uHEb2kTLb5aUodyjddZkDelYpLtS2dayxIGiwM6/m5IMHf3DewhlWiw7g49FFcur2awX6yFtmm1KnUrQSD4Y7Q7/+w1FOfubs2yrmQlaJBl9s/51v5Hrn+acynTt37nzKBvIz2+9e8AULKkRD9XD13jcLvTdnd3w0c/pHrR+j2xWiE8E2fvL+47nen2+aE6OMvL2/tXXRplmRV4J2mCc/eKLQTxcMT42AfOTs9s9ardYlJdiwMjTEkE+fLGm6YKhG2umft1CXwdqtCi0Fcz58rNCVByzPjzDcv0Dy1sU2S2u8CnQiqH+lhF5iehB8/qV2euuqnyW7CjSO8auC/OES09Nvnd0+oNGtS1Kk628VaIcJVZCvLbX99fZvUnLrkOsxpyr0kAmjQC/WWGb72/0ztOGlJV4FOmTCzckfPMT4d601oQuvf798x60OrQXtlLz+w/U/LrW9utVaR67hz8O8lpKfvHHz1v0lppdzsq7wvDH2ivYFTbK+/tPN27c+WmJ6KSe3rsIyYFeFhtWsna5mT4DTdwYfP2B5cWuW6kNbFzpMmFWhFeyCp2mNgdN3Bs3FjaZ7YH+hyyGnla3hRsg995quMSQPmp8sGF5490CuS4rydB9bCdqGTQpG/MbN20AeNJvzy8rlbxX68198mqa6GjRszaJp4XSzeXfO7q9/+3YhCSFS1aFxKbWuPKZrDMnNZrnBkk+/nuvTv1sii3dFaNMDt7HGBhl68I9/fvbZ15ZoGnFhVYnGtdT+/F+5083m7S+efe47m5uL5Hs+ZbPHrorQEjbi8t8FuTm48SyyF8g7Ep66ZryK0LCYssj9qEA3b4Hbzy24vWlEpZ/sCc2Zk3+JGTzRFORm8/oXi25vTh3K4ny9gYelXaNd2FvmO24IpQjK7DuLbm9O26L0A+jIePdHWh0YypemlrQZF47xZcG+OV9pO0YgOLUzc9PnezrRcEMYTGTCsxQayY9z9GDO7Xsq0qcthTmNHk1YwQ6y88jZSQ7j/vTujF1qsJ2pzxkvmwrhPHr8lZL+RqFOhL5Y07tZyq9DgwF5c2dqhnAn7pRs/V0fZiwXRIExESbT+598OdAN9p+de5+rJMTzUmedR8QgK8ITMT60TTWd3ldKmfYQvoPL1nrBqCTy8GAQD2VjeJb28GjYiys/IF0uuRELfUSuJby4XXFeV0olbSeMoih02smajsJXa8119dWVMpf9BZlWqbqkuZeUux4BjWH9U/AOIw0JwWd0v4fXY+CEJJXnGu4QP/TTPwgZ68u+YQh8p2mn+YTouYGllY0/fhiapQPHhuqSLqAdQjrw95XxxjJHC8MV2UfcAlqERLYfxBAaTpxghorHeuY4jF7Oway3Am0HfUJcRLsZ2oXxIzPxcEqWbU/AU9s32uCxbwZwz8Rp2LMxODpqE3zIVWQo9OGdM6F9fA/H8Sq0MuDFRLRUGNMOhg3iayREB8LwSB+jSNNcQKADuMXzMTTa0rGwidXR7jvdDoEUqImzEi39zGvieV4X0QG6Cze7aRhTtOqhuwY6H0NGwGkXlnMX0aarYsy6QceG1JF2+mY/xNRbdBUaxTDXmToYdb2lnxCceoaWk7SEbAIet/FGh/RxfE4mPYyEkWJ5X+dahgQi1DO8R6CpQvQ4CNr8kV53cq8tZ0giRIdDbQ/A2HEY+g/ohCSqH6xG2/ofHtATiF6Q5br3YK5Z6hpPc61ZMkVLQAHPnczaBdEGCX14XYlO14W55oLkc98eE6K3WhkaO27DD9MK7+nc5miDjBXMB9PscuJqdNj1oBYfjqbZGjCP9rO092SK1jZunF1FAFiEie/kaB+qI9IJMTagERANPW2vQvPuDO11saGC8RgbNmFd0p9E6S3anegPrtMbk7FIG9qiEJq+B0tb3MW7fOx7XjoSlGGA17oT8IWKh6ANJWeLstSf4HuaANhbq7k7Gg578/ynMvui0nnJ2S/xgr6mVH63Vq1atWrVqlWrVq1atb4y+i+eyRpeVHFyOAAAAABJRU5ErkJggg=="
			alt="" width="120" height="100">
		<h1 class="h3 mb-3 fw-normal">Sign Up Here</h1>

		<div class="form-floating">
			<input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
			<label for="floatingInput">Username</label>
		</div>

		<div class="form-floating">
			<input type="text" name="phone" class="form-control" id="floatingInput" placeholder="name@example.com">
			<label for="floatingInput">Phone</label>
		</div>

		<div class="form-floating">
			<input type="email" name="mail" class="form-control" id="floatingInput" placeholder="name@example.com">
			<label for="floatingInput">Email address</label>
		</div>
		<div class="form-floating">
			<input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password"
				required>
			<label for="floatingPassword">Password</label>
		</div>

		<button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>

	</form>
</main>
<?php
}
?>