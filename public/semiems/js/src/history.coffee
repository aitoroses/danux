# HISTORY STACK FOR WARDROBES

class History
	constructor: (@stack = []) ->
	save: (wardrobe) ->
		replicate = $.extend(true, {}, wardrobe)
		@stack.push(replicate)
		return @stack
	undo: (wardrobe) ->
		if @stack.length > 0
			wardrobe = @stack.pop()
			return wardrobe
	get_size: ->
		@stack.length

