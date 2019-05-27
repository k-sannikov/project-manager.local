<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <h5>Вы действительно хотите завершить данную задачу?</h5>
      </div>
        <div class="modal-footer text-center">
            <button type="button" class="col btn btn-outline-secondary" data-dismiss="modal"><b>Нет</b></button>
            <form action="{{ route('junior.tasks.update', $task) }}" method="post" class="col pr-0">
                @csrf
                @method('put')
                <button type="submit" class="col btn btn-outline-danger"><b>Да</b></button>
            </form>
        </div>
    </div>
  </div>
</div>
