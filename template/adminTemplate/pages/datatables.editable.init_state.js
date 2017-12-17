/**
 * Theme: Montran Admin Template
 * Author: Coderthemes
 * Component: Editable
 * 
 */

/*
 * Its for State
 * 
 */

(function($) {

    'use strict';

    var EditableTable = {
        options: {
            addButton: '#addToTable',
            table: '#datatable-editable',
            dialog: {
                wrapper: '#dialog',
                cancelButton: '#dialogCancel',
                confirmButton: '#dialogConfirm',
            }
        },
        initialize: function() {
            this
                    .setVars()
                    .build()
                    .events();
        },
        setVars: function() {
            this.$table = $(this.options.table);
            this.$addButton = $(this.options.addButton);

            // dialog
            this.dialog = {};
            this.dialog.$wrapper = $(this.options.dialog.wrapper);
            this.dialog.$cancel = $(this.options.dialog.cancelButton);
            this.dialog.$confirm = $(this.options.dialog.confirmButton);

            return this;
        },
        build: function() {
            this.datatable = this.$table.DataTable({
                aoColumns: [
                    null,
                    null,
                    {"bSortable": false}
                ]
            });

            window.dt = this.datatable;

            return this;
        },
        events: function() {
            var _self = this;

            this.$table
                    .on('click', 'a.save-row', function(e) {
                        e.preventDefault();

                        _self.rowSave($(this).closest('tr'));
                    })
                    .on('click', 'a.cancel-row', function(e) {
                        e.preventDefault();

                        _self.rowCancel($(this).closest('tr'));
                    })
                    .on('click', 'a.edit-row', function(e) {
                        e.preventDefault();

                        _self.rowEdit($(this).closest('tr'));
                    })
                    .on('click', 'a.remove-row', function(e) {
                        e.preventDefault();

                        var $row = $(this).closest('tr');

                        $.magnificPopup.open({
                            items: {
                                src: _self.options.dialog.wrapper,
                                type: 'inline'
                            },
                            preloader: false,
                            modal: true,
                            callbacks: {
                                change: function() {
                                    _self.dialog.$confirm.on('click', function(e) {
                                        e.preventDefault();

                                        _self.rowRemove($row);
                                        $.magnificPopup.close();
                                    });
                                },
                                close: function() {
                                    _self.dialog.$confirm.off('click');
                                }
                            }
                        });
                    });

            this.$addButton.on('click', function(e) {
                e.preventDefault();

                _self.rowAdd();
            });

            this.dialog.$cancel.on('click', function(e) {
                e.preventDefault();
                $.magnificPopup.close();
            });

            return this;
        },
        // ==========================================================================================
        // ROW FUNCTIONS
        // ==========================================================================================
        rowAdd: function() {
            this.$addButton.attr({'disabled': 'disabled'});

            var actions,
                    data,
                    $row;

            actions = [
                '<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>',
                '<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>',
                '<a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>',
                '<a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>'
            ].join(' ');

            data = this.datatable.row.add(['','', actions]);
            $row = this.datatable.row(data[0]).nodes().to$();

            $row
                    .addClass('adding')
                    .find('td:last')
                    .addClass('actions');

            this.rowEdit($row);

            this.datatable.order([0, 'asc']).draw(); // always show fields
        },
        rowCancel: function($row) {
            var _self = this,
                    $actions,
                    i,
                    data;

            if ($row.hasClass('adding')) {
                this.rowRemove($row);
            } else {

                data = this.datatable.row($row.get(0)).data();
                this.datatable.row($row.get(0)).data(data);

                $actions = $row.find('td.actions');
                if ($actions.get(0)) {
                    this.rowSetActionsDefault($row);
                }

                this.datatable.draw();
            }
        },
        rowEdit: function($row) {
            var _self = this,
                    data;

            data = this.datatable.row($row.get(0)).data();
            
            $row.children('td').each(function(i) 
            {
                var $this = $(this);
                if ($this.hasClass('actions')) {
                    _self.rowSetActionsEditing($row);
                } else {
                    if(i==0)
                    {
                        $this.html('<input type="text" class="form-control input-block" value="' + data[i] + '"/>');
                    }
                    else
                    {
                        $.ajax
                        ({
                            type: "post",
                            url: "../getCountry/",
                            success: function(str)
                            {
                                $this.html('<select class="form-control input-block" name="country">'+str+'</select>');
                                $this.find("[name='"+data[1]+"']").attr("selected","selected");
                            }
                        });
                    }
                }
            });
        },
        rowSave: function($row) {
            var _self = this,
                    $actions,
                    values = [];

            ///////////////////////////////////////////////////////
            var mydata = [], i = 0;
            var id = $row.attr("id");
            //////////////////////////////////////////////////////

            values = $row.find('td').map(function() {
                var $this = $(this);

                if ($this.hasClass('actions')) {
                    _self.rowSetActionsDefault($row);
                    return _self.datatable.cell(this).data();
                } else {
                    var tmp = "";
                    /////////////////////////////////////////////
                    if(i==0)
                    {
                        tmp = $.trim($this.find('input').val());
                    }
                    else
                    {
                        tmp = $.trim($this.find($(".form-control option:selected")).text());
                    }
                    mydata[i++] = $.trim($this.find('.form-control').val());
                    /////////////////////////////////////////////
                    return tmp;
                }
            });

            //////////////////////////////////////////////////////////
            //                                                      //
            //       my codding for adding new State                //
            //                                                      //
            //////////////////////////////////////////////////////////
            if ($row.hasClass('adding'))
            {
                $.ajax
                        ({
                            type: "post",
                            url: "insert/",
                            data: "data=" + mydata,
                            success: function(str)
                            {
                                $row.attr("id", str);
                            }
                        });
//                          alert("Record Inserted in database : "+mydata[0]+" & "+mydata[1]+" & "+mydata[2]);
            }
            else
            {
                $.ajax
                        ({
                            type: "post",
                            url: "update/"+id,
                            data: "data=" + mydata,
                            success: function(str)
                            {
                            }
                        });
//                          alert("Record Updated in database : "+mydata[0]+" & "+mydata[1]+" & "+mydata[2]+" and id = "+id);
            }
            //////////////////////////////////////////
            //      my codding over
            ///////////////////////////////////////////
            if ($row.hasClass('adding')) {
                this.$addButton.removeAttr('disabled');
                $row.removeClass('adding');
            }

            this.datatable.row($row.get(0)).data(values);

            $actions = $row.find('td.actions');
            if ($actions.get(0)) {
                this.rowSetActionsDefault($row);
            }

            this.datatable.draw();
        },
        rowRemove: function($row) {
            if ($row.hasClass('adding')) {
                this.$addButton.removeAttr('disabled');
            }

            //////////////////////////////////////////////////////////
            //                                                      //
            //       my codding for delete State                    //
            //                                                      //
            //////////////////////////////////////////////////////////

            var id = $row.attr('id');
            $.ajax
                    ({
                        type: "post",
                        url: "delete/" + id,
                        success: function(str)
                        {

                        }
                    });
            //////////////////////////////////////////
            //      my codding over
            ///////////////////////////////////////////

            this.datatable.row($row.get(0)).remove().draw();
        },
        rowSetActionsEditing: function($row) {
            $row.find('.on-editing').removeClass('hidden');
            $row.find('.on-default').addClass('hidden');
        },
        rowSetActionsDefault: function($row) {
            $row.find('.on-editing').addClass('hidden');
            $row.find('.on-default').removeClass('hidden');
        }

    };

    $(function() {
        EditableTable.initialize();
    });

}).apply(this, [jQuery]);