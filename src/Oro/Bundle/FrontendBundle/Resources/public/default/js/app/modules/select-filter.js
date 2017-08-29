define(function(require) {
    'use strict';

    var _ = require('underscore');
    var SelectFilter = require('oro/filter/select-filter');

    _.extend(SelectFilter.prototype, {
        closeAfterChose: !_.isMobile(),

        /**
         * Selector for filter area
         *
         * @property
         */
        containerSelector: '.filter-criteria-selector',

        /**
         * Filter events
         *
         * @property
         */
        events: {
            'keydown select': '_preventEnterProcessing',
            'click .filter-select': '_onClickFilterArea',
            'click .disable-filter': '_onClickDisableFilter',
            'change select': '_onSelectChange',
            'click .filter-criteria-selector': '_onClickCriteriaSelector'
        },

        /**
         * Set container for dropdown
         * @return {jQuery}
         */
        _setDropdownContainer: function() {
            var $container = null;

            if (_.isMobile()) {
                $container =  this.$el.find('.filter-criteria');
            } else {
                $container =  this.dropdownContainer;
            }

            return $container;
        },

        /**
         * Handle click on criteria selector
         *
         * @param {Event} e
         * @protected
         */
        _onClickCriteriaSelector: function(e) {
            e.stopPropagation();

            if (!this.selectDropdownOpened) {
                this._setButtonPressed(this.$(this.containerSelector), true);
                setTimeout(_.bind(function() {
                    this.selectWidget.multiselect('open');
                }, this), 50);
            } else {
                this._setButtonPressed(this.$(this.containerSelector), false);
            }

            this.selectDropdownOpened = !this.selectDropdownOpened;
        }
    });
});
