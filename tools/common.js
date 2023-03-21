import { promises } from 'fs';
import glob from 'glob';

export const replaceString = ({ items, files, options }) => {
  return new Promise((resolve, reject) => {
    glob(files, { ...options }, async (err, files) => {
      const [file] = files;
      let contents = '';

      try {
        contents = await promises.readFile(file, 'utf-8');
        process.stdout.write(`${file}...`);
      } catch (error) {
        console.log('Read file error', error);
        reject(error);
      }

      items.forEach((item) => {
        const [searchString, replaceString] = item;
        contents.replace(searchString, replaceString);
      });

      try {
        await promises.writeFile(file, contents, 'utf-8');
        process.stdout.write(' [updated]\n');
      } catch (error) {
        console.log('Write file error', error);
        reject(error);
      }

      resolve();
    });
  });
};

export const replaceJson = ({ items, files, options }) => {
  return new Promise((resolve, reject) => {
    glob(files, { ...options }, async (err, files) => {
      const [file] = files;
      let contents = {};

      console.log(items);

      try {
        contents = await promises.readFile(file, 'utf-8');
        contents = JSON.parse(contents);
        process.stdout.write(`${file}...`);
      } catch (error) {
        console.log('Read file error', error);
        reject(error);
      }

      items.forEach((item) => {
        const [property, value] = item;
        contents[property] = value;
      });

      try {
        await promises.writeFile(
          file,
          JSON.stringify(contents, null, 2),
          'utf-8',
        );
        process.stdout.write(' [updated]\n');
      } catch (error) {
        console.log('Write file error', error);
        reject(error);
      }

      resolve();
    });
  });
};
