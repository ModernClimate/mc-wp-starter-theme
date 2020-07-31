/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
import { MediaPlaceholder } from "@wordpress/block-editor";
import { Fragment } from "@wordpress/element";

const name = "ad-blocks/hero";

const settings = {
  title: __("Hero"),
  category: "common",
  description: __("Large banner image"),
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
      selector: ".hero__image",
    },
  },
  example: {},
  edit: ({ attributes, setAttributes, className }) => {
    const { MediaAsset } = attributes;

    return (
      <Fragment>
        <div className="ad-block__hero">
          {MediaAsset ? (
            <img src={MediaAsset} />
          ) : (
            <MediaPlaceholder
              onSelect={(media) => {
                setAttributes({ MediaAsset: media.url });
              }}
              allowedTypes={["image"]}
              labels={{ title: "Hero Image" }}
            />
          )}
        </div>
      </Fragment>
    );
  },
  save: ({ attributes }) => {
    return (
      <Fragment>
        <div className="ad-block__hero hero">
          <div
            className="hero__image bg-defer"
            data-bkg={attributes.MediaAsset}
          ></div>
        </div>
      </Fragment>
    );
  },
};

export { settings, name };
