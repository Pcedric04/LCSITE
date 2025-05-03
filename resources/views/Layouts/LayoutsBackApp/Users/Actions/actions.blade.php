<button onclick="showRecord('{{route('labo.back.users.show',$users->id)}}')" title="modifier"  class="btn btn-sm btn-outline-primary"><span class="fa fa-recycle"></span></button>
<button onclick="deleteRecordConfirm('{{route('labo.back.users.delete',$users->id)}}')" title="supprimer"  class="btn btn-sm btn-outline-danger"><span class="fa fa-trash"></span></button>
<button onclick="statusConfirm('{{route('labo.back.users.status',$users->id)}}')" title="Activer/Désactiver"  class="btn btn-sm btn-outline-success"><span class="fa fa-eye"></span></button>
<button onclick="showRecord('{{route('labo.back.users.status',$users->id)}}')" title="Changer le code d'accès"  class="btn btn-sm btn-outline-warning"><span class="fa fa-key"></span></button>
