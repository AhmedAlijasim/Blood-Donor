<div class="col-xs-3">
	<div class="test_agree">
		<div class="row">	
			<div class="col-xs-12">
				<button class="btn btn-success donClick"><b>Blood Matching Test</b>
					<i class="glyphicon glyphicon-collapse-down"></i>
				</button>
			</div>
		</div>
							
		<div class="row">
			<div class="col-xs-12">
				<div class="donation-show" style="display: none;">
					<form method="post">				
						<div class="row">
							<div class="col-xs-12 text-center">
								<p>To Check For Blood Match</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6" id="Group_label_re"><label>Blood Group Required</label>
							</div>
							<div class="col-xs-6" id="Group_select_re">
								<select id="receiveBlG" required="">
									<option value="A1">		A+ 	</option>
									<option value="A2">		A- 	</option>
									<option value="B1">		B+ 	</option>
									<option value="B2">		B- 	</option>
									<option value="AB1">	AB+ </option>
									<option value="AB2">	AB- </option>
									<option value="O1">		O+ 	</option>
									<option value="O2">		O- 	</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6" id="Group_label_do"><label>Donar Blood Type</label></div>
							<div class="col-xs-6" id="Group_select_do">
								<select id="givenBlG" required="">
									<option value="A1">		A+ 	</option>
									<option value="A2">		A- 	</option>
									<option value="B1">		B+ 	</option>
									<option value="B2">		B- 	</option>
									<option value="AB1">	AB+ </option>
									<option value="AB2">	AB- </option>
									<option value="O1">		O+ 	</option>
									<option value="O2">		O- 	</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<button value="submit" onclick="return test_blood();" class="btn btn-primary" id="testBlood">Test
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
				<div class="col-xs-12">
					<div id="showTest"></div>
				</div>
		</div>		
	</div>
</div>