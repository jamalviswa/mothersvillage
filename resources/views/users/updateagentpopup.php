            
                    <div class="modal-body">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $agent['agent_user_name'] ?>"/>
                            <?php echo csrf_field(); ?>
                        </div>
                         <div class="form-group">
                             <label>Password</label>
                            <input type="text" class="form-control" id="password" name="password" value="<?php //echo $agent['password'] ?>"/>
                            <?php echo csrf_field(); ?>
                        </div>
                    </div>
                    <input type="hidden" id="agent-id" name="agent-id"/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
              
