/**
 * WordPress dependencies
 */
import { __ } from "@wordpress/i18n";
import { Fragment } from "@wordpress/element";
import { PanelBody, PanelRow } from "@wordpress/components";
import { InspectorControls, ColorPalette, RichText } from "@wordpress/block-editor";

function HeroEdit({ attributes, setAttributes, className }) {
  const {
    backgroundColor,
    textColor,
    headline,
    MediaAsset
  } = attributes;

  const style = {
    backgroundColor: backgroundColor,
    color: textColor
  };

  const controls = (
    <Fragment>
      <InspectorControls>
        <PanelBody title={__("Background", "ad-starter")}>
          <PanelRow>
            <div className="wp-block-hero__options-color">
              <label>{__("Background Color", "ad-starter")}</label>
              <ColorPalette
                colors={[
                  { name: "White", color: "#fff" },
                  { name: "Offwhite", color: "#f4f4f4" },
                ]}
                value={backgroundColor}
                onChange={(color) => {
                  setAttributes({
                    backgroundColor: color,
                  });
                }}
                clearable={false}
              />
            </div>
            <div className="wp-block-hero__options-color">
              <label>{__("Text Color", "ad-starter")}</label>
              <ColorPalette
                colors={[
                  { name: "White", color: "#fff" },
                  { name: "Black", color: "#000" },
                ]}
                value={textColor}
                onChange={(color) => {
                  setAttributes({
                    textColor: color,
                  });
                }}
                clearable={false}
              />
            </div>
          </PanelRow>
        </PanelBody>
      </InspectorControls>
    </Fragment>
  );

  return (
    <Fragment>
      {controls}
      <div className="ad-hero" style={style}>
        <RichText
          tagName="h2"
          className="ad-hero__hdg hdg hdg--2"
          placeholder={__("Write headline…", "ad-starter")}
          value={headline}
          onChange={(title) => {
            setAttributes({
              headline: title,
            });
          }}
        />
        {MediaAsset ? (
          <img
            src={MediaAsset}
            className="ad-hero__image"
          />
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
}

export default HeroEdit;
