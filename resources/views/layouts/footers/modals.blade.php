<div class="modal fade" id="contactSeller">
	<div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	
		<!-- Modal Header -->
		<div class="modal-header">
		<h4 class="modal-title">Feedback / Questions</h4>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		
		<!-- Modal body -->
		<div class="modal-body">
			<p>For time sensitive questions contact the auctioneer immediately</p>
			<button type="button" class="btn btn-secondary">Click here for Auctioneer Info</button>
			<h4>What is your question / feedback about</h4>
			<div class="radio">
				<label><input type="radio" name="optradio" checked>Questions about an auction, lot, bidding, shipping, etc. for <a href="#">Bidera</a></label>
			  </div>
			  <label>- Or -</label>
			  <div class="radio">
				<label><input type="radio" name="optradio">Technical website questions, log in issues, or suggestions and enhancements</label>
			  </div>
              <div id="feedback-specifics" class="tab-pane active">
			<fieldset>
				<legend class="hidden"></legend>
				<div class="form-group">
					<label for="feedback-name" class="col-sm-4 control-label">Name (optional)</label>
					<div class="col-sm-8">
						<input class="form-control" id="feedback-name" name="Name" type="text" value="" aria-invalid="false">
					</div>
				</div>
				<div class="form-group">
					<label for="feedback-email" class="col-sm-4 control-label">Email address</label>
					<div class="col-sm-8">
						<input class="form-control" data-val="true" data-val-email="The Email field is not a valid e-mail address." data-val-required="The Email field is required." id="feedback-email" name="Email" placeholder="Email address" type="text" value="" aria-required="true">
						<span class="field-validation-valid help-block" data-valmsg-for="Email" data-valmsg-replace="true"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="feedback-phone" class="col-sm-4 control-label">Phone</label>
					<div class="col-sm-8">
						<input class="form-control" data-val="true" data-val-phone="The Phone field is not a valid phone number." data-val-required="The Phone field is required." id="feedback-phone" name="Phone" placeholder="Phone" type="text" value="" aria-required="true">
						<span class="field-validation-valid help-block" data-valmsg-for="Phone" data-valmsg-replace="true"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="feedback-text" class="col-sm-4 control-label">Feedback / Question</label>
					<div class="col-sm-8"><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
						<textarea class="form-control" cols="20" data-val="true" data-val-length="Maximum 1000 Characters" data-val-length-max="1000" data-val-length-min="1" data-val-required="The Feedback field is required." id="feedback-text" name="Feedback" placeholder="Feedback / Question" rows="2" aria-required="true" spellcheck="false"></textarea>
						<span class="field-validation-valid help-block" data-valmsg-for="Feedback" data-valmsg-replace="true"></span>
					</div>
				</div>
				
			</fieldset>
		</div>
		</div>
		
		<!-- Modal footer -->
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-secondary" >submit</button>
		</div>
		
	</div>
	</div>
</div>
<div class="modal fade" id="bidHistory">
	<div class="modal-dialog modal-dialog-centered">
	<div class="modal-content">
	
		<!-- Modal Header -->
		<div class="modal-header">
		<h4 class="modal-title">Bid History for 101 - 2008 Ford Escape</h4>
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		
		<!-- Modal body -->
		<div class="modal-body">
				

				<h2 id="bid-history-no-history" class="hidden">
					No bids found for this item
				</h2>
				<div id="bid-history-grid" class="">
					<table class="table table-condensed table-hover">
						<thead>
							<tr>
								<th>Bidder</th>
								<th>Bids</th>
								<th>High Bid</th>
								<th>Last Bid</th>
							</tr>
						</thead>
						<tbody id="bid-history-table-body">
							<tr class="hidden">
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						    <tr class="">
								<td>klklk</td>
								<td>9</td>
								<td>1,225.00 USD</td>
								<td>09-02-2021 22:20</td>
							</tr>
                        </tbody>
					</table>
					<div id="bid-history-disclaimer" class="alert alert-info text-center">
						<i class="fa fa-info-circle"></i>
						<span id="bid-history-disclaimer-text">In the case of a tie bid, precedence is given to the earliest bid</span>
					</div>
				</div>
			</div>
		
		<!-- Modal footer -->
		
		
	</div>
	</div>
</div>
