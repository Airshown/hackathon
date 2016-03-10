  <section id="content">
                <div class="container">
					 <div class="card">
							<div class="card-header">
								<h2>Envoi manuel de notification</h2>
							</div>
							<div class="card-body card-padding">
								<form role="form" method="post" action="http://www.coteauto.net/backoffice/notification">
								<input type="hidden" name="envoyer" value="oui">
									<div class="form-group fg-line">
										<label for="exampleInputPassword1">Type d'activité</label>
										<select name="type" class="form-control">
											<?php foreach($resultat as $key => $value): ?>
												<option value="<?php echo $value["id"]; ?>"><?php echo $value["name"]; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group fg-line">
										<label for="exampleInputPassword1">Utilisateur</label>
										<select name="utilisateur" class="form-control">
											<?php foreach($resultatUsers as $key => $value): ?>
												<option value="<?php echo $value["user"]; ?>"><?php echo $value["nom"]." ".$value["prenom"]; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									
									
									
									
									
									<button type="submit" class="btn btn-primary btn-sm m-t-10">Envoyer</button>
								</form>
							</div>
						</div>
		</div>
</section>