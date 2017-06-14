<div class="portlet-body form">
								<!-- BEGIN FORM-->
								<form action="#" class="form-horizontal form-bordered">
									<div class="form-body">
										<div class="form-group">
											<label class="control-label col-md-3">Default Datepicker</label>
											<div class="col-md-3">
												<input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value=""/>
												<span class="help-block">
												Select date </span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Disable Past Dates</label>
											<div class="col-md-3">
												<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
													<input type="text" class="form-control" readonly>
													<span class="input-group-btn">
													<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
													</span>
												</div>
												<!-- /input-group -->
												<span class="help-block">
												Select date </span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Start With Years</label>
											<div class="col-md-3">
												<div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
													<input type="text" class="form-control" readonly>
													<span class="input-group-btn">
													<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
													</span>
												</div>
												<!-- /input-group -->
												<span class="help-block">
												Select date </span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Months Only</label>
											<div class="col-md-3">
												<div class="input-group input-medium date date-picker" data-date="10/2012" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
													<input type="text" class="form-control" readonly>
													<span class="input-group-btn">
													<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
													</span>
												</div>
												<!-- /input-group -->
												<span class="help-block">
												Select month only </span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Date Range</label>
											<div class="col-md-4">
												<div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
													<input type="text" class="form-control" name="from">
													<span class="input-group-addon">
													to </span>
													<input type="text" class="form-control" name="to">
												</div>
												<!-- /input-group -->
												<span class="help-block">
												Select date range </span>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3">Inline</label>
											<div class="col-md-3">
												<div class="date-picker" data-date-format="mm/dd/yyyy">
												</div>
											</div>
										</div>
										<div class="form-group last">
											<label class="control-label col-md-3"></label>
											<div class="col-md-3">
												<a class="btn yellow" href="#form_modal2" data-toggle="modal">
												View Datepicker in modal <i class="fa fa-share"></i>
												</a>
											</div>
										</div>
									</div>
								</form>
								<div id="form_modal2" class="modal fade" role="dialog" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
												<h4 class="modal-title">Datepickers In Modal</h4>
											</div>
											<div class="modal-body">
												<form action="#" class="form-horizontal">
													<div class="form-group">
														<label class="control-label col-md-4">Default Datepicker</label>
														<div class="col-md-8">
															<input class="form-control input-medium date-picker" size="16" type="text" value=""/>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-4">Disable Past Dates</label>
														<div class="col-md-8">
															<div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
																<input type="text" class="form-control" readonly>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
															</div>
															<!-- /input-group -->
															<span class="help-block">
															Select date </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-4">Start With Years</label>
														<div class="col-md-8">
															<div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
																<input type="text" class="form-control" readonly>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
															</div>
															<!-- /input-group -->
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-4">Months Only</label>
														<div class="col-md-8">
															<div class="input-group input-medium date date-picker" data-date="10/2012" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
																<input type="text" class="form-control" readonly>
																<span class="input-group-btn">
																<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
																</span>
															</div>
															<!-- /input-group -->
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-4">Date Range</label>
														<div class="col-md-8">
															<div class="input-group input-medium date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
																<input type="text" class="form-control" name="from">
																<span class="input-group-addon">
																to </span>
																<input type="text" class="form-control" name="to">
															</div>
															<!-- /input-group -->
														</div>
													</div>
												</form>
											</div>
											<div class="modal-footer">
												<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
												<button class="btn green" data-dismiss="modal">Save changes</button>
											</div>
										</div>
									</div>
								</div>
								<!-- END FORM-->
							</div>
						</div>
						<!-- END PORTLET-->
					</div>
				</div>