  <section id="content">
                <div class="container">
					 <div class="card">
							<div class="card-header">
								<h2>Basic Example <small>Individual form controls automatically receive some global styling. All textual 'input', 'textarea', and 'select' elements with .form-control are set to width: 100%; by default. Wrap labels and controls in .form-group for optimum spacing.
	</small></h2>
							</div>
							<div class="card-body card-padding">
								<form role="form" action="http://www.coteauto.net/backoffice/notification">
								<input type="hidden" name="envoyer" value="oui">
									<div class="form-group fg-line">
										<label for="exampleInputPassword1">Type d'activité</label>
										<select name="type" class="form-control">
											<?php foreach($resultat as $key => $value): ?>
												<option value="<?php echo $value["id"]; ?>"><?php echo $value["name"]; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="">
											<i class="input-helper"></i>
											Don't forget to check me out
										</label>
									</div>
									
									<button type="submit" class="btn btn-primary btn-sm m-t-10">Envoyer</button>
								</form>
							</div>
						</div>
		</div>
</section>