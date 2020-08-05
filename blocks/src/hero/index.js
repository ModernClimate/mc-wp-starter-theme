/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
import { MediaPlaceholder } from "@wordpress/block-editor";
import { Fragment } from "@wordpress/element";

/**
 * Internal dependencies
 */
import edit from "./edit";

const name = "ad-blocks/hero";

const settings = {
  title: __("Hero", "ad-starter"),
  category: "common",
  description: __("Large banner image", "ad-starter"),
  icon: "format-image",
  supports: {
    align: true,
    html: false,
  },
  attributes: {
    MediaAsset: {
      type: "string",
      source: "attribute",
      attribute: "data-bkg",
      selector: ".ad-hero__image",
    },
  },
  example: {},
  edit,
  save: ({ attributes }) => {
    return (
      <Fragment>
        <div className="ad-hero">
          <div
            className="ad-hero__image bg-defer"
            data-bkg={attributes.MediaAsset}
          ></div>
        </div>
      </Fragment>
    );
  },
};

export { settings, name };
