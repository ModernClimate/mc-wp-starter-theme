import "@wordpress/block-editor";
import { registerBlockType } from "@wordpress/blocks";

/**
 * Import blocks
 */
import * as content from "./content";

/**
 * Function to register an individual block.
 *
 * @param {Object} block The block to be registered.
 *
 */
const registerBlock = (block) => {
  if (!block) {
    return;
  }
  const { settings, name } = block;

  registerBlockType(name, settings);
};

/**
 * Register our set of custom blocks
 */
[content].forEach(registerBlock);
