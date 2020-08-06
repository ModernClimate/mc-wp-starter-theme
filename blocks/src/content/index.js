/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
import { Fragment } from "@wordpress/element";
import { InnerBlocks } from "@wordpress/block-editor";

const name = "mc-blocks/content";

const settings = {
  title: __("Content", "mc-starter"),
  category: "mc_blocks",
  description: __("Standard content display", "mc-starter"),
  icon: "format-aside",
  edit: () => {
    const ALLOWED_BLOCKS = ['core/classic'];
    const TEMPLATE = [
      ['core/freeform']
    ];

    return (
      <Fragment>
        <div className="mc-block__content mc-content">
          <InnerBlocks
            allowedBlocks={ALLOWED_BLOCKS}
            template={TEMPLATE}
            templateLock={true}
          />
        </div>
      </Fragment>
    );
  },
  save: () => {
    return (
      <Fragment>
        <div className="mc-block__content mc-content">
          <InnerBlocks.Content />
        </div>
      </Fragment>
    );
  },
};

export { settings, name };