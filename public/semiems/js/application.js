$(function() {
  var Router = Backbone.Router.extend({
    routes: {
              "":"paso-1",
              "paso-1": "paso-1",
              "paso-2": "paso-2",
              "paso-3": "paso-3",
              "paso-4": "paso-4",
              "paso-5": "paso-5",
              "paso-6": "paso-6",
              "paso-7": "paso-7",
              "paso-8": "paso-8"
            },
    'paso-1': function() {
      $('#tabs').tabs('select', 'paso-1');
    },
    'paso-2': function() {
      $('#tabs').tabs('select', 'paso-2');
    },
    'paso-3': function() {
      $('#tabs').tabs('select', 'paso-3');
    },
    'paso-4': function() {
      $('#tabs').tabs('select', 'paso-4');
    },
    'paso-5': function() {
      $('#tabs').tabs('select', 'paso-5');
    },
    'paso-6': function() {
      $('#tabs').tabs('select', 'paso-6');
    },
    'paso-7': function() {
      $('#tabs').tabs('select', 'paso-7');
    },
    'paso-8': function() {
      $('tabs').tabs('select', 'paso-8');
    }
  });
  new Router;
  Backbone.history.start({pushState:true, root: '/semiems/semiems/'});
})