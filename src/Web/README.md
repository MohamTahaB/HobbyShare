## AMIS
-  Récupérer la liste des amis d'un user $id
Route::get('/amis/liste/{id}', 'Amis@get_amis');
-  Ajouter un lien ami id_1-id_2
Route::get('/amis/add/{id_1}/{id_2}', 'Amis@add_as_friends');
-  Supprime un lien ami id_1-id_2
Route::get('/amis/remove/{id_1}/{id_2}', 'Amis@remove_as_friends');


## CHATS GROUPES
-  Récupérer tous les messages du chat d'un groupe
Route::get('/chatsgroupe/{id_groupe}', 'ChatsGroupes@get_all_messages');
-  Ajouter un message dans le chat d'un groupe
Route::post('/chatsgroupe/add', 'ChatsGroupes@add_message');
-  Supprimer un message dans le chat d'un groupe
Route::get('/chatsgroupe/remove/{id_message}', 'ChatsGroupes@remove_message');



## CHATS AMIS
-  Récupérer les messages de exp vers dest ou de dest vers exp
Route::get('/chatsutilisateur/get/{id_exp}/{id_dest}', 'ChatsUtilisateurs@get_messages');
-  Ajouter un message dans le chat d'un expediteur vers destinataire
Route::post('/chatsutilisateur/add', 'ChatsUtilisateurs@add_message');
-  Supprimer un message dans le chat
Route::get('/chatsutilisateur/delete/{id_message}', 'ChatsUtilisateurs@remove_message');



## FIL D'ACTUALITE DES AMIS
-  Passer en POST une liste [3,2] d'ids d'amis
Route::post('/filactualiteamis', 'FilActualiteAmis@generer_fil');
-  Ajouter un message dans son fil d'actualité
Route::post('/filactualiteamis/add', 'FilActualiteAmis@add_message');
-  Supprimer un message de son fil d'actualité
Route::get('/filactualiteamis/remove/{id_publication}', 'FilActualiteAmis@remove_message');


## FIL D'ACTUALITE DES GROUPES
-  Passer en POST une liste php [3,2] d'ids de groupes
Route::post('/filactualitegroupes', 'FilActualiteGroupes@generer_fil');
-  Ajouter un message dans son fil d'actualité
Route::post('/filactualitegroupes/add', 'FilActualiteGroupes@add_message');
-  Supprimer un message de son fil d'actualité
Route::get('/filactualitegroupes/remove/{id_publication}', 'FilActualiteGroupes@remove_message');


## GROUPES
-  Récupérer tous les groupes existant
Route::get('/groupes', 'Groupes@get_all');
-  Ajouter un groupe
Route::post('/groupes/add', 'Groupes@add_groupe');
-  Modifier un groupe
Route::post('/groupes/update', 'Groupes@modifier_groupe');
-  Supprimer un groupe
Route::get('/groupes/remove/{id_groupe}', 'Groupes@remove_groupe');



## GROUPES MUTES
-  Récupérer tous les groupes qu'a muté un user
Route::get('/groupesmutes/{id_user}', 'GroupesMutes@get_mutes_groupes');
-  Mute un groupe pour un user
Route::get('/groupesmutes/add/{id_groupe}/{id_user}', 'GroupesMutes@add_user');
-  Supprime le mute pour un groupe et un user
Route::get('/groupesmutes/remove/{id_groupe}/{id_user}', 'GroupesMutes@remove_user');


## LIEN USER-GROUPE
-  Renvoie tous les groupes d'un user
Route::get('/groupes/{id_user}', 'Groupes@get_groups_user');
-  Ajouter un user dans un groupe
Route::get('/groupes/add/{id_groupe}/{id_user}', 'Groupes@add_user');
-  Supprimer un user d'un groupe
Route::get('/groupes/remove/{id_groupe}/{id_user}', 'Groupes@remove_user');


## INVITATIONS AMIS
-  Récupérer les invitations recues par un profil
Route::get('/amis/invitations/{destinataire}', 'Amis@invitations');
-  Envoyer une invitation amie
Route::get('/amis/invitations/add/{expediteur}/{destinataire}', 'Amis@add_invitation');
-  Supprimer une invitation amie
Route::get('/amis/invitations/remove/{expediteur}/{destinataire}', 'Amis@remove_invitation');


## INVITATIONS GROUPE
-  Récupérer toutes les invitations d'un groupe
Route::get('/groupes/invitations/{groupe}', 'Groupes@get_invitations');
-  Ajouter une invitation dans un groupe
Route::get('/groupes/invitations/add/{id_groupe}/{id_user}', 'Groupes@add_invitation');
-  Supprimer une invitation d'un groupe (après acceptation par ex)
Route::get('/groupes/invitations/remove/{id_groupe}/{id_user}', 'Groupes@remove_invitation');


## MODERATEURS GROUPE
-  Récupérer les modérateurs d'un groupe
Route::get('/groupes/moderateurs/{id_groupe}', 'Groupes@get_moderateurs');
-  Ajouter un modérateur dans un groupe
Route::get('/groupes/moderateurs/add/{id_groupe}/{id_user}', 'Groupes@add_moderateur');
-  Supprimer un modérateur dans un groupe
Route::get('/groupes/moderateurs/remove/{id_groupe}/{id_user}', 'Groupes@remove_moderateur');


## PROFILS
-  Récupère tous les profils
Route::get('/amis/', 'Amis@get_all_users');
-  infos sur le profil $id
Route::get('/amis/{id}', 'Amis@get_user');
-  Créer un nouveau profil
Route::post('/profil/nouveau', 'Amis@new_user');
-  Se connecter avec un profil
Route::post('/profil/login', 'Amis@login');
-  Modifier son profil
Route::post('/profil/modifier', 'Amis@modifier');
