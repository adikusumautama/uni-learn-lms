

!function(global,factory){if("function"==typeof define&&define.amd)define("/Plugin/tablesaw",["exports","jquery","Plugin"],factory);else if("undefined"!=typeof exports)factory(exports,require("jquery"),require("Plugin"));else{var mod={exports:{}};factory(mod.exports,global.jQuery,global.Plugin),global.PluginTablesaw=mod.exports}}(this,function(exports,_jquery,_Plugin2){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _jquery2=babelHelpers.interopRequireDefault(_jquery),_Plugin3=babelHelpers.interopRequireDefault(_Plugin2),Tablesaw=function(_Plugin){function Tablesaw(){return babelHelpers.classCallCheck(this,Tablesaw),babelHelpers.possibleConstructorReturn(this,(Tablesaw.__proto__||Object.getPrototypeOf(Tablesaw)).apply(this,arguments))}return babelHelpers.inherits(Tablesaw,_Plugin),babelHelpers.createClass(Tablesaw,[{key:"getName",value:function(){return"tablesaw"}}],[{key:"getDefaults",value:function(){return{}}},{key:"api",value:function(){return function(){void 0!==_jquery2.default.fn.tablesaw&&(0,_jquery2.default)(document).trigger("enhance.tablesaw")}}}]),Tablesaw}(_Plugin3.default);_Plugin3.default.register("tablesaw",Tablesaw),exports.default=Tablesaw});